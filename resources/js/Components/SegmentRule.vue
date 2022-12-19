<template>
  <div class="form-group row mb-5">
    <div class="col-md-2">
      <FormLabel label="Segment Logic" />
    </div>
    <div class="col-md-8">
      <SegmentAndRule
        :and-rules="rules"
        @add-or-rule="addOrRule"
        @remove-or-rule="removeOrRule"
        @column-change="columnChange"
        @condition-change="conditionChange"
        @enter-value="enterValue"
      />
    </div>
  </div>

  <div class="form-group row mb-5 mt-12">
    <div class="col-md-2 my-1"></div>
    <div class="col-md-2 my-1">
      <a
        href="javascript:;"
        @click="$emit('addAndRule')"
        class="btn btn-light-primary"
      >
        <i class="la la-plus"></i>AND
      </a>
    </div>
  </div>
</template>

<script>
import FormInput from "./FormInput.vue";
import FormLabel from "./FormLabel.vue";
import SegmentAndRule from "./SegmentAndRule.vue";

export default {
  props: {
    rules: Object,
  },
  data() {
    return {
      and_rules: 0,
    };
  },

  components: {
    FormInput,
    FormLabel,
    SegmentAndRule,
  },
  methods: {
    addOrRule: function (index) {
      this.$emit("addOrRule", index);
    },
    removeOrRule(orIndex, andIndex) {
      this.$emit("removeOrRule", orIndex, andIndex);
    },
    columnChange(column_name, orIndex, andIndex) {
      this.$emit("columnChange", column_name, orIndex, andIndex);
    },
    conditionChange(condition, orIndex, andIndex) {
      this.$emit("conditionChange", condition, orIndex, andIndex);
    },
    enterValue(value, orIndex, andIndex) {
      this.$emit("enterValue", value, orIndex, andIndex);
    },
  },
};
</script>
