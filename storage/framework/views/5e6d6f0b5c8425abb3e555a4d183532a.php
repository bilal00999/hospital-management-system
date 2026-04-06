<div class="card">
    <h2>My Appointments</h2>
    
    <?php if($appointments->count()): ?>
        <table>
            <thead>
                <tr>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($appointment->doctor->user->name); ?></td>
                        <td><?php echo e($appointment->appointment_date->format('M d, Y')); ?></td>
                        <td><?php echo e($appointment->appointment_time); ?></td>
                        <td><?php echo e(ucfirst($appointment->status)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No appointments scheduled</p>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\hospital management system\resources\views/dashboard/patient.blade.php ENDPATH**/ ?>