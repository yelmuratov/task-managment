<?php $__env->startSection('title', 'Task List'); ?>

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<div class="content-wrapper">
    <section class="content">
        <a href="<?php echo e(route('tasks.create')); ?>" class='btn btn-primary m-2'>Create Task</a>

        <div class="container-fluid">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session('success')); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session('error')); ?></strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="row my-3">
                <form method="GET" action="<?php echo e(route('tasks.index')); ?>" class="form-inline">
                    <div class="form-group mr-2">
                        <label for="start_date" class="mr-2">Start Date:</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(request('start_date')); ?>">
                    </div>
                    <div class="form-group mr-2">
                        <label for="end_date" class="mr-2">End Date:</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(request('end_date')); ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="/tasks" class="btn btn-secondary ml-2">Clear</a>
                </form>
            </div>
            
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Region</th>
                        <th>Performer</th>
                        <th>Category</th>
                        <th>File</th>
                        <th>Period</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $task->areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                        
                        <tr>
                            <td><?php echo e($task->id); ?></td>
                            <td><?php echo e($task->title); ?></td>
                            <td>
                                <span class="badge badge-info"><?php echo e($area->name); ?></span>

                            </td>
                            <td><?php echo e($task->performer); ?></td>
                            <td><?php echo e($task->categories->name); ?></td>
                            <td>
                                <?php if($task->file): ?>
                                    <a href="<?php echo e(asset('storage/' . $task->file)); ?>" target="_blank">View File</a>
                                <?php else: ?>
                                    No File 
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($task->period); ?></td>
                            <td>
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" class="btn btn-sm btn-warning">Edit</a> 
                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>                
            </table>
            <?php echo e($tasks->links()); ?>

        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>document.addEventListener("DOMContentLoaded", function() {
    flatpickr("#start_date", { dateFormat: "Y-m-d" });
    flatpickr("#end_date", { dateFormat: "Y-m-d" });
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\Desktop\task-managment\resources\views/task/task.blade.php ENDPATH**/ ?>