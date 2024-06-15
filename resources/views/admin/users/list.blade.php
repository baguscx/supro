<?php
$users = [
    [
        'name' => 'John Doe',
        'email' => 'john@example.com',
        'role' => 'Admin'
    ],
    [
        'name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'role' => 'User'
    ],
    // Add more users as needed
];
?>
<x-app-layout>
    <!-- Page Heading -->
    <div class="flex flex-wrap items-center justify-between mb-4">
        <h1 class="text-3xl font-bold text-gray-800">List User</h1>
    </div>

    <div class="user-list">
        <table class="min-w-full">
            <tr>
                <th class="px-6 py-3 bg-gray-100">Name</th>
                <th class="px-6 py-3 bg-gray-100">Email</th>
                <th class="px-6 py-3 bg-gray-100">Role</th>
                <th class="px-6 py-3 bg-gray-100">Action</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr class="border-b">
                    <td class="px-6 py-4"><?php echo $user['name']; ?></td>
                    <td class="px-6 py-4"><?php echo $user['email']; ?></td>
                    <td class="px-6 py-4"><?php echo $user['role']; ?></td>
                    <td class="px-6 py-4">
                        <a href="#" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="#" class="text-red-500 hover:underline">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</x-app-layout>
