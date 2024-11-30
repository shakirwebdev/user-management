<template>
    <div class="flex flex-col items-center justify-center bg-gray-100">
      <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">Add New User</h2>
        <form @submit.prevent="addUser" class="flex flex-col gap-4">
          <input
            v-model="name"
            type="text"
            placeholder="Enter user name"
            class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <input
            v-model="email"
            type="text"
            placeholder="Enter Email"
            class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <input
            v-model="phone"
            type="text"
            placeholder="Enter phone"
            class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <input
            v-model="password"
            type="text"
            placeholder="Enter Password"
            class="p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            required
          />
          <button
            type="submit"
            class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition"
          >
            Add User
          </button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  import { ref } from "vue";
  import axios from "axios";
  
  export default {
    emits: ["userAdded"],
    setup(_, { emit }) {
      const name = ref("");
      const email = ref("");
      const phone = ref("");
      const password = ref("");
  
      const addUser = async () => {
        try {
          await axios.post("/api/user/add", { 
            name: name.value,
            email: email.value,
            phone: phone.value,
            password: password.value,
        });
          name.value = "";
          email.value = "";
          phone.value = "";
          password.value = "";
          emit("userAdded");
        } catch (error) {
          console.error("Error adding user:", error);
        }
      };
  
      return { name, email, phone, password, addUser };
    },
  };
  </script>
  