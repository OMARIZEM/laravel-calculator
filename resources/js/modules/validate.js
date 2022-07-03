/**
 * check form validation
 *
 * @params formReference - The target form to validate
 *
 * @return {boolean}
 */
export const validate = (formReference) => {
    let isValid = true;
    if (formReference) {

        formReference?.querySelectorAll("input")?.forEach((input) => {

            if (input.getAttribute("rules")) {
                const rules = input.getAttribute("rules").split(",");

                rules.forEach((rule) => {
                    // every rule should be defined like: "name:value"
                    if (
                        rule?.split(':').length > 0
                        &&
                        !$rules[rule?.split(':')[0]](input.value, rule?.split(':')[1])
                    ) {
                        input.classList.add("border-danger");
                        isValid = false;
                    } else {
                        input.classList.remove("border-danger");
                    }
                });
            } else {
                input.classList.remove("border-danger");
            }
        });
    }
    return isValid;
}

const $rules = {
    required: (inputValue, ruleValue = true) => {
        if (ruleValue) return !!inputValue;
        return true;
    },
    pattern: (inputValue, ruleValue) => {
        const rgx = new RegExp(ruleValue);
        return rgx.test(inputValue);
    }
}
