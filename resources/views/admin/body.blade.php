<div class="main-panel">
    <div class="content-wrapper">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card corona-gradient-card">
            <div class="card-body py-0 px-0 px-sm-3">
              <div class="row align-items-center">
                <div class="col-4 col-sm-3 col-xl-2">
                  <img src="admin_dashboard/assets/images/dashboard/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                </div>
                <div class="col-5 col-sm-7 col-xl-8 p-0">
                  <h4 class="mb-1 mb-sm-0 text-center">Welcome to Your Admin Dashboard!</h4>
                 <p class="mb-0 font-weight-normal d-none d-sm-block text-center">Manage your store with ease and efficiency. We’re here to support your growth!</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$total_product}}</h3>
                  
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Products</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$total_order}}</h3>
                    
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Orders </h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0"> {{$total_customer}}</h3>
                   
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-danger">
                    <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal">Total Customers</h6>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-9">
                  <div class="d-flex align-items-center align-self-start">
                    <h3 class="mb-0">{{$total_category}}</h3>
                     
                  </div>
                </div>
                <div class="col-3">
                  <div class="icon icon-box-success ">
                    <span class="mdi mdi-arrow-top-right icon-item"></span>
                  </div>
                </div>
              </div>
              <h6 class="text-muted font-weight-normal"> Total Categories</h6>
            </div>
          </div>
        </div>
      </div>
        
      <div class="row">
       
        <div class="col-sm-4 grid-margin">
          <div class="card">
            <div class="card-body">
              <h5>Orders Processing</h5>
              <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                  <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">{{$order_processing}}</h2>
                  </div>
                  
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                  <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 grid-margin">
          <div class="card">
            <div class="card-body">
              <h5>Orders Delieverd</h5>
              <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                  <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">{{$order_delivered}}</h2>
                    
                  </div>
                  
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                  <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-4 grid-margin">
          <div class="card">
            <div class="card-body">
              <h5>Revenue</h5>
              <div class="row">
                <div class="col-8 col-sm-12 col-xl-8 my-auto">
                  <div class="d-flex d-sm-block d-md-flex align-items-center">
                    <h2 class="mb-0">{{$total_revenue}}</h2>
                    
                  </div>
                  
                </div>
                <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                  <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>






      <div class="row">
        <!-- Transaction History on the left side -->
        <div class="col-md-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Transaction History</h4>
                    <canvas id="transaction-history" class="transaction-chart"></canvas>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Paypal</h6>
                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">$236</h6>
                        </div>
                    </div>
                    <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                        <div class="text-md-center text-xl-left">
                            <h6 class="mb-1">Transfer to Stripe</h6>
                            <p class="text-muted mb-0">07 Jan 2019, 09:12AM</p>
                        </div>
                        <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                            <h6 class="font-weight-bold mb-0">$593</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- To-Do List on the right side -->
        <div class="col-md-5 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">To do list</h4>
                    <div class="add-items d-flex">
                        <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                        <button class="add btn btn-primary todo-list-add-btn">Add</button>
                    </div>
                    <div class="list-wrapper">
                        <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                            <li>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Create invoice </label>
                                </div>
                                <i class="remove mdi mdi-close-box"></i>
                            </li>
                            <li>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                                </div>
                                <i class="remove mdi mdi-close-box"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked> Prepare for presentation </label>
                                </div>
                                <i class="remove mdi mdi-close-box"></i>
                            </li>
                            <li>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Plan weekend outing </label>
                                </div>
                                <i class="remove mdi mdi-close-box"></i>
                            </li>
                            <li>
                                <div class="form-check form-check-primary">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox"> Pick up kids from school </label>
                                </div>
                                <i class="remove mdi mdi-close-box"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        

       
      
         
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Visitors by Countries</h4>
              <div class="row">
                <div class="col-md-5">
                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-us"></i>
                          </td>
                          <td>USA</td>
                          <td class="text-right"> 1500 </td>
                          <td class="text-right font-weight-medium"> 56.35% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-de"></i>
                          </td>
                          <td>Germany</td>
                          <td class="text-right"> 800 </td>
                          <td class="text-right font-weight-medium"> 33.25% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-au"></i>
                          </td>
                          <td>Australia</td>
                          <td class="text-right"> 760 </td>
                          <td class="text-right font-weight-medium"> 15.45% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-gb"></i>
                          </td>
                          <td>United Kingdom</td>
                          <td class="text-right"> 450 </td>
                          <td class="text-right font-weight-medium"> 25.00% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-ro"></i>
                          </td>
                          <td>Romania</td>
                          <td class="text-right"> 620 </td>
                          <td class="text-right font-weight-medium"> 10.25% </td>
                        </tr>
                        <tr>
                          <td>
                            <i class="flag-icon flag-icon-br"></i>
                          </td>
                          <td>Brasil</td>
                          <td class="text-right"> 230 </td>
                          <td class="text-right font-weight-medium"> 75.00% </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-7">
                  <div id="audience-map" class="vector-map"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>