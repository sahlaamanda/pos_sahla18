<?php if($paginator->hasPages()): ?>

<nav aria-label="Pagination">

    <div class="mt-3">

        
        <div class="mb-2">
            <span class="small text-muted">
                Showing
                <strong><?php echo e($paginator->firstItem()); ?></strong>
                to
                <strong><?php echo e($paginator->lastItem()); ?></strong>
                of
                <strong><?php echo e($paginator->total()); ?></strong>
                results
            </span>
        </div>


        
        <ul class="pagination mb-0">

            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item disabled">
                    <span class="page-link">
                        &lsaquo;
                    </span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link"
                       href="<?php echo e($paginator->previousPageUrl()); ?>">
                        &lsaquo;
                    </a>
                </li>
            <?php endif; ?>


            
            <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php if(is_string($element)): ?>
                    <li class="page-item disabled">
                        <span class="page-link">
                            <?php echo e($element); ?>

                        </span>
                    </li>
                <?php endif; ?>


                <?php if(is_array($element)): ?>
                    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php if($page == $paginator->currentPage()): ?>

                            <li class="page-item active">
                                <span class="page-link">
                                    <?php echo e($page); ?>

                                </span>
                            </li>

                        <?php else: ?>

                            <li class="page-item">
                                <a class="page-link"
                                   href="<?php echo e($url); ?>">
                                    <?php echo e($page); ?>

                                </a>
                            </li>

                        <?php endif; ?>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            
            <?php if($paginator->hasMorePages()): ?>

                <li class="page-item">
                    <a class="page-link"
                       href="<?php echo e($paginator->nextPageUrl()); ?>">
                        &rsaquo;
                    </a>
                </li>

            <?php else: ?>

                <li class="page-item disabled">
                    <span class="page-link">
                        &rsaquo;
                    </span>
                </li>

            <?php endif; ?>

        </ul>

    </div>

</nav>

<?php endif; ?><?php /**PATH C:\laragon\www\pos_sahla\resources\views/vendor/pagination/bootstrap-5.blade.php ENDPATH**/ ?>