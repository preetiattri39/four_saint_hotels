<?php $__env->startSection('title', 'Edit User'); ?>
<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/css/intlTelInput.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>
<div class="page-header">
    <h3 class="page-title"> Users</h3>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="<?php echo e(route('admin.dashboard')); ?>">Dashboard</a></li>  
        <li class="breadcrumb-item"><a href="<?php echo e(route('admin.user.list')); ?>">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
            <h4 class="card-title">Edit User</h4>
             
            <form class="forms-sample" id="Edit-User" action="<?php echo e(route('admin.user.edit',['id' => $user->id])); ?>" method="POST" enctype="multipart/form-data">
              <?php echo csrf_field(); ?>
              
              <div class="form-group">
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputFirstName">Profile</label>
                        <img 
                            class=" img-lg  rounded-circle"
                            <?php if(isset($user->userDetail) && !is_null($user->userDetail->profile)): ?>
                                src="<?php echo e(asset('storage/images/' . $user->userDetail->profile)); ?>"
                            <?php else: ?>
                                src="<?php echo e(asset('admin/images/faces/face15.jpg')); ?>"
                            <?php endif; ?>
                            onerror="this.src = '<?php echo e(asset('admin/images/faces/face15.jpg')); ?>'"
                            alt="User profile picture">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label for="exampleInputFirstName">First Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['first_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputFirstName" placeholder="First Name" name="first_name" value="<?php echo e($user->first_name ?? ''); ?>">
                        <?php $__errorArgs = ['first_name'];
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
                        <label for="exampleInputLastName">Last Name</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['last_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="exampleInputLastName" placeholder="Last Name" name="last_name" value="<?php echo e($user->last_name ?? ''); ?>">
                        <?php $__errorArgs = ['last_name'];
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
                    <div class="col-6">
                        <label for="exampleInputGender">Gender</label>
                        <select name="gender" id="exampleInputGender" class="form-control  <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" >
                            <option value="">Select Gender</option>
                            <option value="Male" <?php echo e($user->userDetail ? (($user->userDetail->gender == 'Male' ) ? 'selected': '') : ''); ?>>Male</option>
                            <option value="Female" <?php echo e($user->userDetail ? (($user->userDetail->gender == 'Female' ) ? 'selected': '') : ''); ?>>Female</option>
                            <option value="Other" <?php echo e($user->userDetail ? (($user->userDetail->gender == 'Other' ) ? 'selected': '') : ''); ?>>Other</option>
                        </select>
                        <?php $__errorArgs = ['gender'];
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
                        <label for="address">Address</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="address" placeholder="Address" name = "address" value = <?php echo e($user->userDetail ? ($user->userDetail->address ?? '') : ''); ?>>
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
                </div>
              </div>
              <div class="form-group">
                <div class="row">
                    <div class="col-12">
                        <label>Profile upload</label>
                          <input type="file" name="profile" class="form-control file-upload-info" placeholder="Upload Image" accept="image/*">
                    </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2" >Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ09dtOd8YHF_ZCbfbaaMHJKiOr26noY8&libraries=places" ></script>
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.6.1/build/js/intlTelInput.min.js"></script>
<script>
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

    $("#Edit-User").submit(function(e){
        e.preventDefault();
    }).validate({
        rules: {
            first_name: {
                required: true,
                noSpace: true,
                minlength: 3,
                maxlength:25,
            },
            last_name: {
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
        },
        submitHandler: function(form) {
          form.submit();
      }

    });
  });
  </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/four_saints_hotels/resources/views/admin/user/edit.blade.php ENDPATH**/ ?>