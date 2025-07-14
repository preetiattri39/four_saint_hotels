<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/css/intlTelInput.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Profile Detail'); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title"> Settings</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page"> <a href="#"> Settings</a></li>
        <li class="breadcrumb-item ">Profile</li>
      </ol>
    </nav>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div>
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Personal Information</h4>
             
            <form class="forms-sample" id="profile-setting" action="<?php echo e(route('admin.profile')); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputFirstName">Full Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputFirstName" placeholder="full name" name="full_name" value="<?php echo e($user->full_name ?? ''); ?>">
                        <?php $__errorArgs = ['full_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                   
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputEmail">Email address</label>
                        <input type="email" class="form-control  <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputEmail" placeholder="Email" name="email" value="<?php echo e($user->email ?? ''); ?>" readonly>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6 select_country_code">
                        <label for="phone">Phone Number</label>
                        <input type="tel" class="form-control <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="phone" placeholder="Phone Number" name="phone_number" value="<?php echo e($user->userDetail ? ($user->userDetail->phone_number ?? '') : ''); ?>">
                        <input type="hidden" name="country_code" value="">
                        <input type="hidden" name="country_short_code" value="<?php echo e($user->userDetail ? ($user->userDetail->country_short_code ?? 'us') : 'us'); ?>">
                        <?php $__errorArgs = ['phone_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="dob">Date Of Birth</label>
                        <input type="date" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="dob"  name = "dob" value = "<?php echo e($user->userDetail ? ($user->userDetail->dob ? ($user->userDetail->dob) : '') : ''); ?>" max="<?php echo e(\Carbon\Carbon::yesterday()->format('Y-m-d')); ?>">
                        <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6">
                        <label for="address">Address</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" placeholder="Address" name = "address" value = "<?php echo e($user->userDetail ? ($user->userDetail->address ? ($user->userDetail->address) : '') : ''); ?>">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="invalid-feedback" role="alert">
                                <strong><?php echo e($message); ?></strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                   
                </div> 
              </div>

              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputPinCode">Pin Code</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputPinCode" placeholder="Pin Code" name="zip_code" value = <?php echo e($user->userDetail ?($user->userDetail->zip_code ?? '') : ''); ?>>
                        <?php $__errorArgs = ['zip_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                          <span class="invalid-feedback" role="alert">
                              <strong><?php echo e($message); ?></strong>
                          </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="col-6">
                        <label>Profile upload</label>
                          <input type="file" name="profile" class="form-control file-upload-info" placeholder="Upload Image" accept="image/*">
                    </div>
                </div>
              </div>
              <div class="form-group">
                <label for="two_factor_auth">Two-Factor Authentication</label>
                <div class="toggle-user dark-toggle">
                        <input type="checkbox" name="two_factor_enabled" data-id="<?php echo e($user->id); ?>" class="switch" <?php if($user->two_factor_enabled == 1): ?> checked <?php endif; ?> data-value="<?php echo e($user->two_factor_enabled); ?>">
                        </div> 
            </div>
            <div class="text-end">
              <button type="submit" class="btn btn-primary mr-2">Update</button>
              
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ09dtOd8YHF_ZCbfbaaMHJKiOr26noY8&libraries=places" ></script>
 --><script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/intlTelInput.min.js"></script>
<script>
    $('#two_factor_auth').on('change', function () {
    const label = $(this).next('label');
    if ($(this).is(':checked')) {
        label.text('Enabled');
    } else {
        label.text('Disabled');
    }
});

    document.addEventListener('DOMContentLoaded', function () {
        const input = document.querySelector("#phone");
        const countryShortCode = document.querySelector("input[name='country_short_code']").value;
        const iti = window.intlTelInput(input, {
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/utils.js",
            initialCountry: countryShortCode,
            formatOnDisplay: false,  
            nationalMode: false,    
        });

        
        document.querySelector("#phone").addEventListener("change", function(event) {
            const countryData = iti.getSelectedCountryData();
            
            let phoneNumber = iti.getNumber("e164");
            phoneNumber = phoneNumber.replace(/\D/g, '');
           
            document.querySelector("input[name='country_code']").value = countryData.dialCode;
            document.querySelector("input[name='country_short_code']").value = countryData.iso2;

            input.value = phoneNumber;
        });
    });
</script>


<script>
  $(document).ready(function() {

    var err = false;
    var autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('address'), {
            types: ['geocode']
        }
    );
    autocomplete.addListener('place_changed', function() {
        var place = autocomplete.getPlace();
        var postalCode = '';
        if (place.address_components) {
            for (var i = 0; i < place.address_components.length; i++) {
                var component = place.address_components[i];
                if (component.types.includes('postal_code')) {
                    postalCode = component.long_name;
                    break;
                }
            }
            $('#exampleInputPinCode').val(postalCode);
        }
    });


    $("#profile-setting").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            full_name: {
                required: true,
                noSpace: true,
                minlength: 3,
                maxlength:25,
            },
           
            email: {
                required: true,
                email: true
            },
            phone_number: {
                number: true,
                // minlength:10,
                maxlength: 12,
                noSpace: true,
            },
            zip_code: {
                number: true,
                minlength:10,
                maxlength: 10,
                noSpace: true,
            },
            zip_code:{
                maxlength: 8,
            },
        },
        messages: {
            first_name: {
                required: "First name is required",
                minlength: "First name must consist of at least 3 characters",
                maxlength: "First name must not contains more then 25 characters."
            },
            last_name: {
                required: "Last name is required",
                minlength: "Last name must consist of at least 3 characters",
                maxlength: "Last name must not contains more then 25 characters."
            },
            email: {
                email: "Please enter a valid email address"
            },
            phone_number: {
                number: 'Only numeric value is acceptable',
                minlength:  'Phone number must be 10 digits',
                maxlength:  'Phone number must be 10 digits'
            },
            zip_code:{
                maxlength: 'Zip Code must be less then 8 charcter',
            },
        },
        submitHandler: function(form) {
          var formData = new FormData(form);
          var action = $(form).attr('action'); // Corrected to use jQuery
          $.ajax({
              url: action, // Use the form's action attribute
              type: 'POST',
              data: formData,
              contentType: false,
              processData: false,
              success: function(response) {
                console.log(response);  
                  // Handle success
                  if (response.status == "success") {
                    toastr.success(response.message);
                     
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                  } else {
                    toastr.error(response.message);
                  }
              },
              error: function(xhr, status, error) {
                  // Handle error 
                  let response = xhr.responseJSON;
                  toastr.error(response.message);
              }
          });
      }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/profile/detail.blade.php ENDPATH**/ ?>