<?php

if (!function_exists("clsx")) {
    function clsx(...$classes): string
    {
        $classNames = [];

        foreach ($classes as $class) {
            if (is_array($class)) {
                foreach ($class as $key => $value) {
                    if (gettype($key) === "integer" && gettype($value) === "string") {
                        $classNames[] = $value;
                        continue;
                    }

                    if (!empty($value)) {
                        $classNames[] = $key;
                    }
                }
            } elseif (is_string($class) && !empty($class)) {
                $classNames[] = $class;
            }
        }

        return implode(' ', $classNames);
    }
}
