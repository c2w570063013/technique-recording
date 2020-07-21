import functools
import time


# 1. return True or False
def return_true_or_false():
    # True would be returned.
    return False or True


# 2. pythonic way to return generated list
def py_way_return_gen_list():
    return list(i for i in range(10) if i != 5)


# 3. python decorator
def slow_down(_func=None, *, rate=1):
    """Sleep given amount of seconds before calling the function"""

    def decorator_slow_down(func):
        @functools.wraps(func)
        def wrapper_slow_down(*args, **kwargs):
            time.sleep(rate)
            return func(*args, **kwargs)

        return wrapper_slow_down

    if _func is None:
        return decorator_slow_down
    else:
        return decorator_slow_down(_func)

# 4. python @property and @property.setter
