
<style>
    section.pricing {
  background: #007bff;
  background: linear-gradient(to right, #f1f6ff, #2face2);
  
}
label.btn.btn-default {
    border: 1px solid;
    margin-left: 31%;
}

.pricing .card {
  border: none;
  border-radius: 1rem;
  transition: all 0.2s;
  box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1);
}

.pricing hr {
  margin: 1.5rem 0;
}

.pricing .card-title {
  margin: 0.5rem 0;
  font-size: 0.9rem;
  letter-spacing: .1rem;
  font-weight: bold;
}
.py-5{
    padding-top:8rem!important
}
.py-5 {
    padding-bottom: 13rem!important;
}

.pricing .card-price {
  font-size: 3rem;
  margin: 0;
}

.pricing .card-price .period {
  font-size: 0.8rem;
}

.pricing ul li {
  margin-bottom: 1rem;
}

.pricing .text-muted {
  opacity: 0.7;
}

.pricing .btn {
  font-size: 80%;
  border-radius: 5rem;
  letter-spacing: .1rem;
  font-weight: bold;
  padding: 1rem;
  opacity: 0.7;
  transition: all 0.2s;
}

/* Hover Effects on Card */

@media (min-width: 992px) {
  .pricing .card:hover {
    margin-top: -.25rem;
    margin-bottom: .25rem;
    box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.3);
  }

  .pricing .card:hover .btn {
    opacity: 1;
  }
}
input[type="radio"] {
  display: none;
}
label {
  display: inline-block;
  background-color: #f1f1f1;
  padding: 5px 11px;
  font-family: Arial;
  font-size: 16px;
  cursor: pointer;
  border-radius:9px;
}
input[type="radio"]:checked+label {
  background-color: #31b0d5;
}
</style>
<section class="pricing py-5">
  <div class="container">
    <div class="row">
      <!-- Free Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">           
            <h6 class="card-price text-center">₹0<span class="period">/free</span></h6>
            <span style="margin-left: 37%;">(3 Months)</span>
            <hr>
            <ul class="fa-ul">
               <!-- <li class="text-muted"><span class="fa-li"><i class="fas fa-times"></i></span>Monthly Status
                Reports</li> -->
            </ul>
            <div class="d-grid">                
              <input type="radio" id="free" name="plan" value="free">
              <label class="btn btn-default" for="free">select plan</label>
            </div>
          </div>
        </div>
      </div>
      <!-- Plus Tier -->
      <div class="col-lg-4">
        <div class="card mb-5 mb-lg-0">
          <div class="card-body">            
            <h6 class="card-price text-center">₹499<span class="period">/month</span></h6>
            <p style="color:white">helo</p>
            <hr>
            <ul class="fa-ul">
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span><strong>5 Users</strong></li>              -->
            </ul>
            <div class="d-grid">             
              <input type="radio" id="month" name="plan" value="month">
              <label class="btn btn-default" for="month">select plan</label>
            </div>
          </div>
        </div>
      </div>
      <!-- Pro Tier -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">           
            <h6 class="card-price text-center">₹6000<span class="period">/year</span></h6>
            <p style="color:white">helo</p>
            <hr>
            <ul class="fa-ul">             
              <!-- <li><span class="fa-li"><i class="fas fa-check"></i></span>150GB Storage</li>              -->
            </ul>
            <div class="d-grid">              
              <input id="year" type="radio" name="plan" value="year">
              <label class="btn btn-default" for="year">select plan</label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="<?= asset_url('assets/ext/jquery/jquery.min.js') ?>"></script>
<script src="<?= asset_url('assets/ext/jquery-ui/jquery-ui.min.js') ?>"></script>