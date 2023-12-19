<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <?php if($startShow != 1): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=course&authorId=<?= $idAuthorCurrent ?>&page=1" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
             </li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">...</span>
                </a>
            </li>
        <?php endif ?>
        <?php for($i=$startShow; $i<=$totalShow; $i++): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=course&authorId=<?= $idAuthorCurrent ?>&page=<?= $i; ?>"><?= $i; ?></a>
            </li>
        <?php endfor ?>
        <?php if($totalShow < $total && $totalShow != $totalPage): ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">...</span>
                </a>
            </li>
        <?php endif ?>
        <?php if($totalShow < $total && $totalShow != $totalPage): ?>
            <li class="page-item">
                <a class="page-link" href="index.php?controller=course&authorId=<?= $idAuthorCurrent ?>&page=<?= $totalPage ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>