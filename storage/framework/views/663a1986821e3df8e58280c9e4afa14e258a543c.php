<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">                        
                        <li class="breadcrumb-item active" aria-current="page">Product Category</li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">                    
                    <div class="panel-heading">
                        <a class="btn btn-success" href="<?php echo e(url('category/form')); ?>">Add New</a> &nbsp;&nbsp;
                        <!-- <button class="btn btn-danger">Remove</button> -->
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Image</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($records)): ?>
                                        <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr style="cursor: pointer;" data-id="<?php echo e($record->pc_id); ?>">
                                            <td><?php echo e($record->pc_id); ?></td>
                                            <td><?php echo e($record->name); ?></td>
                                            <td><?php echo e($record->image_url); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>                                
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
<script>
$(document).ready(function(){
    
    // Tr
    $('tr').click(function(){
        var pc_id = $(this).attr('data-id');
        //console.log(pc_id);
        location = "<?php echo e(url('product')); ?>" +'/'+ pc_id;
    });
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>