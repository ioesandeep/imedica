
<div class="block full">
    <div class="block-title">
        <h2>Doctors Table</h2>
    </div>

    <?php if(isset($message)){ ?>
        <div class="alert alert-success alert-dismissable">
            <?php
            echo $message;
            ?>
        </div>
        <?php
    }?>

    <div class="table-responsive">
        <table id="example-datatable" class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 100px;">Serial No</th>
                <th>Name</th>
                <th>Specification</th>
                <th>Specialization</th>
                <th>Degree</th>
<!--                <th>Location</th>-->
<!--                <th>Phone Number</th>-->
<!--                <th>Email</th>-->
                <th class="text-center" style="width: 125px;"><i class="fa fa-flash"></i></th>
            </tr>
            </thead>
            <tbody>

            <?php
            foreach ($query as $k=>$row)
            {?>
            <tr>
                <td class="text-center"><?php echo $k+1;?></td>
                <td><strong><?php echo $row->name;?></strong></td>
                <td><?php $sp = $this->admin_model->table_fetch_row('doctor_category',array('id'=>$row->specification));

                    echo $sp['0']->category_name;?></td>
                <td><strong><?php echo $row->specialization;?></strong></td>
                <td><?php echo $row->degree;?></td>
<!--                <td>--><?php //echo $row->location;?><!--</td>-->
<!--                <td>--><?php //echo $row->phone_no;?><!--</td>-->
<!--                <td>--><?php //echo $row->email;?><!--</td>-->

                <td class="text-center">
                    <a href="#modal-fade" title="view_doctors" class="btn btn-effect-ripple btn-xs btn-info view-modal" data-toggle="modal" data-name="<?php echo $row->name;?>" data-specification="<?php echo $sp['0']->category_name;;?>" data-specialization="<?php echo $row->specialization;?>" data-degree="<?php echo $row->degree;?>" data-location="<?php echo $row->location;?>" data-phone="<?php echo $row->phone_no;?>" data-id="<?php echo $row->id;?>" data-email="<?php echo $row->email;?>">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a href="<?php echo base_url('admin/doctors/edit/'.$row->id);?>" data-toggle="tooltip" title="edit_doctors" class="btn btn-effect-ripple btn-xs btn-success"><i class="fa fa-pencil"></i></a>
                    <a href="#" data-href="<?php echo base_url('admin/doctors/delete/'.$row->id);?>" data-toggle="modal" data-name="<?php echo $row->name;?>" title="delete_doctor" data-target="#confirm-delete" class="btn btn-effect-ripple btn-xs btn-danger del-row"><i class="fa fa-times"></i></a>
                </td>
            </tr>
    </div>
<?php } ?>
    </tbody>
    </table>
</div>

<div id="modal-fade" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title"><strong>Doctors Details</strong></h3>
            </div>
            <div class="modal-body">
                <div class="box span3">
                    <div class="box-content">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>ID</td>
                                <td id="doctors_id"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td id="name"></td>
                            </tr>
                            <tr>
                                <td>Specification</td>
                                <td id="specification"></td>
                            </tr>
                            <tr>
                                <td>Specialization</td>
                                <td id="specialization"></td>
                            </tr>
                            <tr>
                                <td>Degree</td>
                                <td id="degree"></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td id="location"></td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td id="phone_no"></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td id="email"></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-effect-ripple btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div id="confirm-delete" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span id="del_name"></span></h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this record?
            </div>
            <div class="modal-footer">

                <a class="btn btn-effect-ripple btn-danger">Delete</a>
                <button type="button" data-dismiss="modal"class="btn btn-effect-ripple btn-default" data-dismiss="modal">Cancel</button>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $('a.view-modal').click(function(e){
            var id = $(this).attr('data-id');
            var name = $(this).attr('data-name');
            var specification = $(this).attr('data-specification');
            var specialization = $(this).attr('data-specialization');
            var degree = $(this).attr('data-degree');
            var location = $(this).attr('data-location');
            var phone = $(this).attr('data-phone');
            var email = $(this).attr('data-email');

            $('td#doctors_id').html(id);
            $('td#name').html(name);
            $('td#specification').html(specification);
            $('td#specialization').html(specialization);
            $('td#degree').html(degree);
            $('td#location').html(location);
            $('td#phone_no').html(phone);
            $('td#email').html(email);
        })
    });

    $(function(){
        $('a.del-row').click(function(e) {
            var name = $(this).attr('data-name');
            $('span#del_name').html(name);
        });
    });

    $('#confirm-delete').on('show.bs.modal', function(e) {
        $(this).find('.btn-danger').attr('href', $(e.relatedTarget).data('href'));
    });
</script>




