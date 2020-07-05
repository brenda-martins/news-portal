@extends('admin.master.master')

@section('content')

<div>
    <h4 style="margin-top: 4%;">Adicionar postagem</h4>
    <hr>

    <div class="post-buttons">
        <div>
            <button class="btn btn-secondary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
        </div>
    </div>

    <div style="text-align:center;margin-top:40px;">
        <span class="step"></span>
        <span class="step"></span>
        <span class="step"></span>
    </div>
    <form id="regForm" method="post" action="{{ route('admin.post.store') }}" style="width: 100%;" enctype="multipart/form-data">
        @csrf

        <div class="tab">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Escolha a categoria</label>
                <select class="form-control" name="category">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group">
                <label for="exampleFormControlSelect1">Autor</label>
                <input type="text" class="form-control" name="author">
                <small class="form-text text-muted">Se deixar em branco será exibido seu nome.</small>

            </div>


            <div class="form-group">
                <label>Título da publicação</label>
                <input type="text" class="form-control" name="title">
            </div>
        </div>

        <div class="tab">
            <textarea id="mytextarea" style="min-height: 450px;" name="content"></textarea>
        </div>

        <div class="tab">
            <div class="featured-image">
                <img id="blah" />
                <input type='file' onchange="readURL(this);" name="file" />
            </div>
        </div>


    </form>


    @section('scripts')
    <script src="https://cdn.tiny.cloud/1/82bmftj7j05pf47ku4ygtxfofvka9eon163ecel5xatsaxxm/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


        tinymce.init({
            selector: '#mytextarea'

        });

        var currentTab = 0;
        showTab(currentTab);


        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";

            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                // document.getElementById("nextBtn").setAttribute("type", "submit");
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            fixStepIndicator(n)
        }

        function fixStepIndicator(n) {

            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }

            x[n].className += " active";
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regForm").submit();
                // return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }
    </script>
    @endsection
</div>

@endsection