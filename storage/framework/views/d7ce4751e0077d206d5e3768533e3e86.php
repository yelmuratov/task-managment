<?php $__env->startSection('title', 'Category List'); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <section class="content">
        <a href="#" class='btn btn-primary m-2' data-toggle="modal" data-target="#createCategoryModal">Create Category</a>

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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->id); ?></td>
                            <td><?php echo e($item->name); ?></td>
                            <td>
                                <a href="#" 
                                   class="btn btn-sm btn-warning edit-btn" 
                                   data-id="<?php echo e($item->id); ?>" 
                                   data-name="<?php echo e($item->name); ?>" 
                                   data-toggle="modal" 
                                   data-target="#editCategoryModal">Edit</a> 
                                   <form action="/category/delete/<?php echo e($item->id); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php echo e($categories->links()); ?>

        </div>
    </section>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createCategoryModal" tabindex="-1" role="dialog" aria-labelledby="createCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/category/store" method="POST">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category-name">Category Name</label>
                        <input type="text" class="form-control" id="category-name" name="name" required>
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
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="/category/update" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="edit-category-id" name="id">
                    <div class="form-group">
                        <label for="edit-category-name">Category Name</label>
                        <input type="text" class="form-control" id="edit-category-name" name="name" required>
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

              document.getElementById('edit-category-id').value = id;
              document.getElementById('edit-category-name').value = name;
          });
      });
  });
</script>

<script>
  document.addEventListener('DOMContentLoaded', () => {
      const deleteForms = document.querySelectorAll('form[action^="/category/delete"]');

      deleteForms.forEach(form => {
          form.addEventListener('submit', (event) => {
              const confirmation = confirm('Are you sure you want to delete this category?');
              if (!confirmation) {
                  event.preventDefault();
              }
          });
      });
  });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminLayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\Desktop\task-managment\resources\views/category/categories.blade.php ENDPATH**/ ?>