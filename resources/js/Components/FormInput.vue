<template>
  <input
    :type="type"
    :placeholder="placeholder"
    :name="name"
    class="form-control mb-2 mb-md-0"
  />
</template>

<script>
export default {
  props: {
    name: String,
    placeholder: String,
    type: {
      type: String,
      default: "text",
    },
  },
};
</script>
