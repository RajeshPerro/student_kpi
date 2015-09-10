<?php
/**
 * Created by PhpStorm.
 * User: rajesh
 * Date: 9/9/15
 * Time: 10:50 AM
 */
?>
<!-- <table >

                            <?php
$sl=0;
foreach($fetch_result as $value)
{
    $sl++;

    ?>
                            <tr class="student-row" >
                                <td><?php echo $sl;?></td>
                                <td>
                                <p class="student-id" data-id="<?php echo $value['s_id'];?>"><?php echo $value['s_id'];?></p>
                                </td>
                                <td>
                                <p id="js_s_name" class="student-name" data-name="<?php echo $value['name'];?>"><?php echo $value['name'];?></p>
                                </td>
                                <td><a class=" add_score btn btn-success" href="#" data-toggle="modal" data-target=".pop"> Add Score</a></td>
                            </tr>
                            <?php }?>
                        </table> -->

<script>
    $(document).ready(function() {
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth() + 1; //January is 0!
        var yyyy = today.getFullYear();

        if (dd < 10) {
            dd = '0' + dd
        }

        if (mm < 10) {
            mm = '0' + mm
        }

        today = yyyy + '/' + mm + '/' + dd;
        $("#e_date").val(today);
        console.log(today);
    });
</script>
