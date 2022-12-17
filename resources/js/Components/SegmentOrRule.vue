<template>
  <div class="col-md-3 my-1">
    <select class="form-select" @change="columnChange($event)">
      <option value="created_at">Created at</option>
      <option value="first_name">First name</option>
      <option value="last_name">Last name</option>
      <option value="email">Email</option>
      <option value="birth_day">Bith Day</option>
    </select>
  </div>
  <div class="col-md-3 my-1">
    <select class="form-select">
      <option
        v-for="option in select_options"
        :key="index"
        :value="option.value"
      >
        {{ option.label }}
      </option>
    </select>
  </div>
  <div class="col-md-3 my-1">
    <FormInput type="text" name="value" placeholder="Enter logic value" />
  </div>
  <div class="col-md-1 my-1">
    <button v-if="deletable" type="button" class="btn btn-light-danger px-2">
      <i class="la la-trash-o fs-2"></i>
    </button>
  </div>
</template>
    
  <script>
import FormInput from "./FormInput.vue";
import FormLabel from "./FormLabel.vue";

export default {
  props: {
    deletable: {
      type: Boolean,
      default: true,
    },
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
    };
  },

  components: {
    FormInput,
    FormLabel,
  },

  methods: {
    columnChange(event) {
      let column_name = event.target.value;
      this.select_options = this[column_name];
    },
  },
};
</script>
    