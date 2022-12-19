<template>
  <div class="col-md-3 my-1">
    <select
      class="form-select"
      @change="columnChange($event, orIndex, andIndex)"
    >
      <option value="created_at">Created at</option>
      <option value="first_name">First name</option>
      <option value="last_name">Last name</option>
      <option value="email">Email</option>
      <option value="birth_day">Bith Day</option>
    </select>
  </div>
  <div class="col-md-3 my-1">
    <select
      class="form-select"
      @change="conditionChange($event, orIndex, andIndex)"
    >
      <option value="">Select one</option>
      <option
        v-for="(option, index) in select_options"
        :key="index"
        :value="option.value"
      >
        {{ option.label }}
      </option>
    </select>
  </div>
  <div class="col-md-3 my-1">
    <FormInput
      v-if="value_type == 'text'"
      type="text"
      placeholder="Enter value"
      @input="enterValue($event, orIndex, andIndex)"
    />
    <Datepicker
      v-if="value_type == 'date'"
      @selected="dateSeleted($event, orIndex, andIndex)"
      class="form-control mb-2 mb-md-0"
    />
  </div>
  <div class="col-md-1 my-1">
    <button
      v-if="andIndex > 0 || orIndex > 0"
      type="button"
      class="btn btn-light-danger px-2"
      @click="$emit('removeOrRule', orIndex, andIndex)"
    >
      <i class="la la-trash-o fs-2"></i>
    </button>
  </div>
</template>
    
<script>
import FormInput from "./FormInput.vue";
import FormLabel from "./FormLabel.vue";
import Datepicker from "vuejs3-datepicker";
import moment from "moment";
export default {
  props: {
    orRule: Object,
    andIndex: Number,
    orIndex: Number,
  },
  data() {
    let date_field = [
      { value: "on", label: "On" },
      { value: "before", label: "Before" },
      { value: "after", label: "After" },
      { value: "on_or_before", label: "On or before" },
      { value: "on_or_after", label: "On or after" },
      { value: "between", label: "Between" },
    ];

    let text_field = [
      { value: "is", label: "Is" },
      { value: "is_not", label: "Is not" },
      { value: "contain", label: "Contain" },
      { value: "does_not_contain", label: "Doesn't contain" },
      { value: "start_with", label: "Start with" },
      { value: "end_with", label: "End with" },
      { value: "does_not_start_with", label: "Doesn't tart with" },
      { value: "does_not_end_with", label: "Doesn't end with" },
    ];

    return {
      select_options: date_field,
      created_at: date_field,
      birth_day: date_field,
      first_name: text_field,
      last_name: text_field,
      email: text_field,
      value_type: "date",
    };
  },

  components: {
    FormInput,
    FormLabel,
    Datepicker,
  },

  methods: {
    columnChange(event, orIndex, andIndex) {
      let column_name = event.target.value;
      this.select_options = this[column_name];

      if (column_name == "created_at" || column_name == "birth_day") {
        this.value_type = "date";
      } else {
        this.value_type = "text";
      }

      this.$emit("columnChange", column_name, orIndex, andIndex);
    },
    conditionChange(event, orIndex, andIndex) {
      let condition = event.target.value;
      this.$emit("conditionChange", condition, orIndex, andIndex);
    },
    enterValue(event, orIndex, andIndex) {
      let value = event.target.value;
      this.$emit("enterValue", value, orIndex, andIndex);
    },
    dateSeleted(event, orIndex, andIndex) {
      let date = moment(event).format("YYYY-MM-DD");
      this.$emit("enterValue", date, orIndex, andIndex);
    },
  },
};
</script>
    