<!DOCTYPE html>
<html>
<head>
    <title>Your OTP Code</title>
</head>
<body>
    <p>Hello Admin,</p>
    <p>Your One-Time Password (OTP) is:</p>
    <h2><?php echo e($code); ?></h2>
    <p>This code is valid for 10 minutes. Do not share it with anyone.</p>
</body>
</html>
<?php /**PATH /var/www/html/four_saints_hotels/resources/views/emails/admin-2fa-code.blade.php ENDPATH**/ ?>