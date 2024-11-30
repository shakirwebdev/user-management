<template>
    <div class="flex flex-col items-center justify-center mt-8 bg-gray-100">
      <div class="bg-white shadow-md rounded-lg p-6 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-4 text-center text-gray-800">User List</h2>
        <input
          v-model="filter"
          type="text"
          placeholder="Filter by name"
          class="p-3 mb-4 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
        />
        <ul class="w-full">
          <li
            v-for="user in filteredUsers"
            :key="user.id"
            class="p-3 border-b border-gray-200 last:border-b-0"
          >
            {{ user.name }}
          </li>
          <li v-if="filteredUsers.length === 0" class="text-gray-500 text-center">
            No users found.
          </li>
        </ul>
      </div>
    </div>
  </template>
  
  <script>
  import { ref, computed, onMounted } from "vue";
  import axios from "axios";
  
  export default {
    setup() {
      const users = ref([]);
      const filter = ref("");
  
      const fetchUsers = async () => {
        try {
          const response = await axios.get("/api/user/all");
          users.value = response.data.Data;
        } catch (error) {
          console.error("Error fetching users:", error);
        }
      };
  
      const filteredUsers = computed(() => {
        if (!filter.value) {
          return users.value;
        }
        return users.value.filter((user) =>
          user.name.toLowerCase().includes(filter.value.toLowerCase())
        );
      });
  
      onMounted(fetchUsers);
  
      return { users, filter, fetchUsers, filteredUsers };
    },
  };
  </script>
  