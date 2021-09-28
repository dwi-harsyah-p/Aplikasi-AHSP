                <!-- Dashboard Content -->
                               <div class="card-body">
                                   <div class="tab-content">
                                       <div class="tab-pane container active" id="profile">
                                           <div class="card-deck">
                                               <div class="card border-primary">
                                                 <div class="card-harder bg-primary text-light text-center lead">
                                                     User ID: 
                                                 </div>  
                                                 <div class="card-body">
                                                     <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8 ">Name: </p>
                                                     <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8 ">
                                                    E-mail: </p>
                                                     <p class="card-text p-2 m-1 rounded" style="border:1px solid #0275d8 " >Phone Number: </p>
                                                     <div class="clearfix"></div>
                                                 </div>
                                               </div>
                                               <div class="card border-primary rounded-0">
                                                   <!-- <img src="img/undraw_profile.svg" alt=""> -->
                                               </div>
                                           </div>
                                       </div>
                                       <!-- Profile content end -->

                                       <!-- Edit content start -->
                                       <div class="tab-pane container fade" id="editProfile">
                                           <div class="card-deck">
                                               <div class="card border-primary align-self-center">
                                                <!-- <img src="img/undraw_profile.svg" alt="" class="img-thumnail img-fluid" width="480px"> -->
                                               </div>
                                               <div class="card border-primary">
                                                   <form action="" method="POST" class="px-3 mt-2" enctype="multipart/form-data">
                                                <input type="hidden" name="oldimage" value="">
                                                <div class="form-group m-0">
                                                    <label for="profilePhoto" name="image" id="profilePhoto" class="m-1">Upload Profile Picture</label>
                                                    <input type="file" name="image" id=profilePhoto>
                                                </div>

                                                <div class="form-group m-0">
                                                    <label for="profilePhoto" name="name"  class="m-1">Name: </label>
                                                    <input type="text" name="name" id="name" class="form-control" value="" >
                                                </div>

                                                <div class="form-group m-0">
                                                    <label for="email" name="email"  class="m-1">E-mail </label>
                                                    <input type="text" name="email" id="email" class="form-control" value="" placeholder="*********@gmail.com" >
                                                </div>

                                                <div class="form-group m-0">
                                                    <label for="phone" name="name"  class="m-1">Phone </label>
                                                    <input type="tel" name="phone" id="iphone" class="form-control" value="" >
                                                </div>

                                                <div class="form-group mt-2">
                                                    <input type="submit" name="profile_update" value="Update Profile " class="btn btn-danger btn-block" id="profileUpdateBtn">
                                                </div>


                                            </form>
                                               </div>
                                           </div>
                                       </div>
                                       <!-- Edit content end -->
               