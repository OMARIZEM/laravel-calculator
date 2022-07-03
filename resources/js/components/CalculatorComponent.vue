<template>
  <div class="container my-3">
    <div class="row justify-content-around">
      <div class="col-6 rounded shadow">
        <div id="calculator-form">
          <form @submit.prevent="onSubmit" ref="form">
            <div class="form-group">
              <label label-for="first-number">First number : </label>
              <div class="input-group">
                <input
                  :rules="['required:true', 'pattern:\\-?[0-9]+']"
                  aria-label="first-number"
                  v-model="form.firstNumber"
                  type="number"
                  id="first-number"
                  name="firstNnumber"
                  placeholder="First number here ..."
                  class="form-control"
                />
              </div>
            </div>

            <div class="form-group">
              <select
                id="operator"
                name="operator"
                class="form-control"
                aria-label="operation"
                v-model="form.operator"
              >
                <option value="+">Plus (+)</option>
                <option value="-">Minus (-)</option>
                <option value="*">Multiplication (*)</option>
                <option value="/">Division (/)</option>
              </select>
            </div>

            <div class="form-group">
              <label label-for="second-number">Second number : </label>
              <div class="input-group">
                <input
                  :rules="['required:true', 'pattern:\\-?[0-9]+']"
                  aria-label="first-number"
                  v-model="form.secondNumber"
                  type="number"
                  id="second-number"
                  name="secondNnumber"
                  placeholder="Second number here ..."
                  class="form-control"
                />
              </div>
            </div>

            <div class="form-group">
              <button
                :disabled="this.calculating"
                type="submit"
                class="btn btn-block btn-lg btn-primary"
              >
                {{ this.calculating ? "Getting result ..." : "Calculate Now" }}
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { validate } from "../modules/validate"
export default {
  name: "CalculatorComponent",
  data() {
    return {
      form: {
        firstNumber: null,
        secondNumber: null,
        operator: "+",
      },
      calculating: false,
    }
  },
  computed: {
    expression() {
      return `${this.form.firstNumber}${this.form.operator}${this.form.secondNumber}`
    },
  },
  methods: {
    getExpressionResult(expression) {
      this.calculating = true
      axios
        .post("/calculator", {
          expression,
        })
        .then(({ data: { success, data } }) => {
          if (success) {
            alert(data.expression + " = " + data.result)
          }
        })
        .catch((err) => {
          if (err?.response) {
            alert(err.response?.data.message)
          } else alert("Please try again.")
        })
        .finally(() => (this.calculating = false))
    },
    onSubmit() {
      if (validate(this.$refs.form)) {
        this.getExpressionResult(this.expression)
      }
    },
  },
}
</script>

<style></style>
