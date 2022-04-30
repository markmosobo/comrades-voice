<template>
    <div class="container">
<section class="contact-section">
    <div class="container" id="vote">
        <div class="row no-gutters align-items-center">
        <div class="col-md-6 col-lg-5">
            <form class="contact-form" action="" method="post">
                    {{csrf_field()}}
                    <h3>Get out your vote</h3>
                    <p>Please fill your university registration number below</p>
                    <input type="text" class="form-control" placeholder="Your Reg No" name="name">

                    <button class="btn btn-solid" type="submit">Submit</button>
                </form>
            </div>
            <div class="col-md-6 col-lg-7">
                <div class="contact-info" hidden>
                    <!-- <h3>A simple and transparent voting process</h3> -->
                    <p>Please choose your preferred candidate in the following categories:</p>
                    <form>
                    <h3>Student Leader</h3>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <h3>Secretary General</h3>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <h3>Finance</h3>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <h3>School Rep</h3>
                    <h5>Male</h5>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <h5>Female</h5>
                    <div class="radio">
                    <label><input type="radio" name="optrad">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradi">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradia">Option 3</label>
                    </div>
                    <h3>Co-curricular</h3>
                    <h5>Male</h5>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>
                    <h5>Female</h5>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 1</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 2</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="optradio">Option 3</label>
                    </div>

                    <button class="btn btn-solid" type="submit">Vote</button>

                </form>  
                </div>
            </div>

        </div>
    </div>
  </section>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
