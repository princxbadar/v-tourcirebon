<x-dashboard-layout>
    <main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Profile</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Edit Profile</li>
        </ol>
        
        <!-- Name &Email Edit -->
        <div class="container">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('profile.partials.update-profile-information-form')            
                    </div>
                </div>
            </div>
            </div>
        </div> 
        <!-- Password Edit -->
        <div class="container mt-3">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('profile.partials.update-password-form')          
                    </div>
                </div>
            </div>
            </div>
        </div>
         <!--Delete Account  -->
        <div class="container mt-3 mb-3">
            <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        @include('profile.partials.delete-user-form')          
                    </div>
                </div>
            </div>
            </div>
        </div> 

    </div>
    </main>
</x-dashboard-layout>