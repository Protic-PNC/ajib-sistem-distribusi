import { IncomingMessage, ServerResponse, createServer } from "node:http";
import { faker } from "@faker-js/faker";

const createOrder = (customerIds) => ({
    id: faker.string.nanoid(),
    product_id: faker.string.nanoid(),
    customer_id: faker.helpers.arrayElement(customerIds),
    status: faker.helpers.arrayElement(["waiting", "ongoing", "done"]),
    branch_id: faker.helpers.arrayElement(["CB000", "CB001", "CB002"]),
    created_at: faker.date.anytime(),
    updated_at: faker.date.anytime(),
});

const createCustomer = () => ({
    id: faker.string.nanoid(),
    name: faker.person.fullName(),
    address: faker.location.streetAddress({ useFullAddress: true }),
    branch_id: faker.helpers.arrayElement(["CB000", "CB001", "CB002"]),
    created_at: faker.date.anytime(),
    updated_at: faker.date.anytime(),
});

const customers = faker.helpers.multiple(createCustomer, { count: 10 });
const orders = faker.helpers.multiple(
    () => createOrder(customers.map((c) => c.id)),
    { count: 7 }
);

/**
 *
 * @param {ServerResponse<IncomingMessage> & {req: IncomingMessage}} res
 * @returns
 */
const sendJson = (res, body, status = 200) => {
    res.statusCode = status;
    res.setHeader("Content-Type", "application/json");
    res.end(JSON.stringify(body));
};

const app = createServer(async (req, res) => {
    if (req.url) {
        const url = new URL(req.url, `http://${req.headers.host}`);

        if (url.pathname === "/")
            return sendJson(res, { message: "hello world" });

        if (url.pathname === "/api/customers") {
            if (req.method === "GET") {
                return sendJson(res, {
                    message: "success",
                    data: [...customers],
                });
            }
        }

        if (url.pathname.startsWith("/api/orders")) {
            const matches = url.pathname.match(
                /[^\/api\/orders\/][A-Za-z0-9_-]+/g
            );

            if (matches !== null) {
                if (req.method === "GET") {
                    const order = orders.find((o) => o.id === matches[0]);

                    if (!order)
                        return sendJson(res, { message: "not found" }, 400);

                    order.customer =
                        customers.find((c) => c.id === order.customer_id) ??
                        null;

                    return sendJson(res, {
                        message: "success",
                        data: orders.find((o) => o.id === matches[0]),
                    });
                }
            }

            const mappedOrders = orders.map((o) => {
                const customer = customers.find((c) => c.id === o.customer_id);

                o.customer = customer
                    ? pick(customer, "id", "name", "address")
                    : null;
                return o;
            });

            return sendJson(res, {
                message: "success",
                data: mappedOrders,
            });
        }
    }

    sendJson(res, { message: "not found" }, 404);
});

/**
 * Picks specific properties from an object.
 *
 * @template {{}} T
 * @param {T} obj - The object from which to pick properties.
 * @param {...(keyof T)} properties - The properties to pick.
 * @returns {Pick<T, keyof T>} - An object containing only the selected properties.
 */
function pick(obj, ...properties) {
    return properties.reduce((pickedObj, property) => {
        if (property in obj) {
            pickedObj[property] = obj[property];
        }
        return pickedObj;
    }, {});
}

app.listen(3000, () =>
    console.log("Mock server running at http://localhost:3000")
);
