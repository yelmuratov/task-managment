<?php $__env->startSection('title', 'Area List'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <a href="#" class='btn btn-primary m-2' data-toggle="modal" data-target="#createAreaModal">Create Area</a>

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

            

            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>User ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $areas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $area): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($area->id); ?></td>
                            <td><?php echo e($area->name); ?></td>
                            <td><?php echo e($area->users->name); ?></td>
                            <td>
                                <a href="#" 
                                   class="btn btn-sm btn-warning edit-btn" 
                                   data-id="<?php echo e($area->id); ?>" 
                                   data-name="<?php echo e($area->name); ?>" 
                                   data-user_id="<?php echo e($area->user_id); ?>" 
                                   data-toggle="modal" 
                                   data-target="#editAreaModal">Edit</a> 
                                   <form action="/area/delete/<?php echo e($area->id); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($areas->links()); ?>

        </div>
    </section>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createAreaModal" tabindex="-1" role="dialog" aria-labelledby="createAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/area/store" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAreaModalLabel">Create Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="user-id">User</label>
                        <select class="form-control" id="user-id" name="user_id" required>
                            <option value="" disabled selected>Select a User</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="area-name">Area Name</label>
                        <input type="text" class="form-control" id="area-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editAreaModal" tabindex="-1" role="dialog" aria-labelledby="editAreaModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/area/update" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editAreaModalLabel">Edit Area</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-area-id" name="id">
                    <div class="form-group">
                        <label for="edit-user-id">User</label>
                        <select class="form-control" id="edit-user-id" name="user_id" required>
                            <option value="" disabled>Select a User</option>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="edit-area-name">Area Name</label>
                        <input type="text" class="form-control" id="edit-area-name" name="name" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const editButtons = document.querySelectorAll('.edit-btn');
      editButtons.forEach(button => {
          button.addEventListener('click', () => {
              const id = button.getAttribute('data-id');
              const name = button.getAttribute('data-name');
              const userId = button.getAttribute('data-user_id');

              document.getElementById('edit-area-id').value = id;
              document.getElementById('edit-user-id').value = userId;
              document.getElementById('edit-area-name').value = name;
          });
      });

      const deleteForms = document.querySelectorAll('.delete-btn');
      deleteForms.forEach(form => {
          form.addEventListener('click', (event) => {
              const confirmation = confirm('Are you sure you want to delete this area?');
              if (!confirmation) {
                  event.preventDefault();
              }
          });
      });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\Desktop\task-managment\resources\views/area/areas.blade.php ENDPATH**/ ?>