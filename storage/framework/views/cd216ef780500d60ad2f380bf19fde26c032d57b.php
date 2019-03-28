<?php $__env->startSection('content'); ?>
<div class="container">

    <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(url('category')); ?>">Product Category</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo e(url('product') .'/'. $pc_id); ?>"><?php echo e(ucfirst($pc_name)); ?></a></li>
                    </ol>
                </nav> 
            </div>
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">                        
                        Product Details
                    </div>
                    <!-- /.panel-heading -->
                    <form method="POST" action="<?php echo e(url('product/add') .'/'. $pc_id); ?>">
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Name:</label>
                                <div class="form-action">
                                    <input type="text" name="name" value="<?php echo e(old('name')); ?>">
                                    <?php if($errors->has('name')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>                
                            <div class="form-group">
                                <label>Image:</label>
                                <div class="form-action">
                                    <input type="text" name="image" value="<?php echo e(old('image')); ?>">
                                    <?php if($errors->has('image')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <div class="form-action">
                                    <select name="stock">
                                    <?php for($x=0; $x<=100; $x++): ?>
                                        <option value="<?php echo e($x); ?>" <?php echo e(( old("stock") == $x ? "selected":"")); ?>><?php echo e($x); ?></option>
                                    <?php endfor; ?>
                                    </select>
                                    <?php if($errors->has('stock')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('stock')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <div class="form-action">
                                    <textarea name="description"><?php echo e(old('description')); ?></textarea>
                                    <?php if($errors->has('description')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('description')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Submit</button>
                            </div>
                        </div>
                        <?php echo e(csrf_field()); ?>

                    </form>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>