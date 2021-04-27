<div class="container margin_30_95">
    <div class="main_title_2">
        <span><em></em></span>
        <h2><?php echo get_phrase('regisgtrtion_event'); ?></h2>
        <p><?php echo get_phrase('get_category_wise_different_courses'); ?></p>
    </div>
    <form action="<?= site_url('home/event_registration/'.$e_id.'/register') ?>" method="post">
        <input type="hidden" name="e_id" value="<?=$e_id ?>">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="form-group row">
                    <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="fullname" name="fullname">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="organization_name" class="col-sm-2 col-form-label">Organization Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="organization_name" name="organization_name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="phone_number" name="phone_number">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Register</button>
            </div>
        </div>
    </form>
</div>