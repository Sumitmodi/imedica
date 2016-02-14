<div class="block">
    <div class="block-title">
        <h2>Search Results</h2>
    </div>


    <div class="alert alert-success alert-dismissable">
        <?php echo "Total Results are : " . '<strong>' . $query[0] . '</strong><br>'; ?>
    </div>
    <div class="alert alert-info alert-dismissable">
        <?php
        if ($query[1][0] > 0) {
            echo $query[1][0] . ' results found in Medicines.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=medicines'); ?>">&nbsp;View</a>
            <br><br>
        <?php }
        if ($query[1][1] > 0) {
            echo $query[1][1] . ' results found in CIMS.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=cims'); ?>">&nbsp;View</a>
            <br><br>
        <?php }
        if ($query[1][2] > 0) {
            echo $query[1][2] . ' results found in NIMS.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=nims'); ?>">&nbsp;View</a>
            <br><br>
        <?php }
        if ($query[1][3] > 0) {
            echo $query[1][3] . ' results found in Pharmaceuticals.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=pharmaceuticals'); ?>">&nbsp;View</a>
            <br><br>
        <?php }
        if ($query[1][4] > 0) {
            echo $query[1][4] . ' results found in Doctors.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=doctors'); ?>">&nbsp;View</a>
            <br><br>
        <?php }
        if ($query[1][5] > 0) {
            echo $query[1][5] . ' results found in Hospitals.'; ?>
            <a href="<?php echo base_url('admin/searchlist?keyword=' . $keyword . '&& table=hospitals'); ?>">&nbsp;View</a>
            <br><br>
        <?php } ?>

    </div>
</div>

