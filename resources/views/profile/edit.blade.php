<x-app-layout>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                <h4 class="card-header">Profile Details</h4>
                <!-- Account -->
                <div class="card-body">
                    @include('profile.partials.update-profile')
                </div>
                <!-- /Account -->
            </div>

            {{-- password --}}
            <div class="col-md-12">
                <div class="card mb-4">
                <h4 class="card-header">Change Password</h4>
                <!-- Account -->
                <div class="card-body">
                    @include('profile.partials.update-password')
                </div>
                <!-- /Account -->
            </div>
            {{-- password --}}

        </div>
    </div>
</x-app-layout>
