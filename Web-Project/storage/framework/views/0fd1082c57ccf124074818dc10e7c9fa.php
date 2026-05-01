<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Appointments</title>
</head>
<body>


<h1>Appointments List</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Customer</th>
        <th>Therapist</th>
        <th>Service</th>
        <th>Date</th>
        <th>Time</th>
        <th>Status</th>
    </tr>

    <?php $__empty_1 = true; $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <tr>
        <td><?php echo e($appointment->id); ?></td>
        <td><?php echo e($appointment->customer->name ?? 'N/A'); ?></td>
        <td><?php echo e($appointment->therapist->name ?? 'N/A'); ?></td>
        <td><?php echo e($appointment->service->service_name ?? 'N/A'); ?></td>
        <td><?php echo e($appointment->appointment_date); ?></td>
        <td><?php echo e($appointment->appointment_time); ?></td>
        <td><?php echo e($appointment->status); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <tr>
        <td colspan="7">No appointments found</td>
    </tr>
    <?php endif; ?>

</table>

<br>

<?php echo e($appointments->links()); ?>


</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\Web-Project\resources\views/appointments/index.blade.php ENDPATH**/ ?>