<!DOCTYPE html>
<html >


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<h4>Enter you career information : </h4>
<HR>
<form method="post" action="{{ route('AddCareerInfo')}}"  enctype="multipart/form-data" >

    <div class="form-group">
        <label> Enter first name:  </label>
        <input type="text" class="form-control " name="FirstName">
        <br>
    </div>


    <div class="form-group">
        <label> Enter Last name:  </label>
        <input type="text" class="form-control " name="LastName">
        <br>
    </div>
    <div class="form-group">
        <label> Enter Email:  </label>
        <input type="email" class="form-control " name="email">
        <br>
    </div>

    <div class="form-group">
        <label> Enter you cv (.pdf/.doc) :  </label>
        <input type="file" class="form-control" required value="" id="cv" name='cv' />
        <br>
    </div>

    <br>
    <label> Enter the position you are applying for:</label>
    <br>
    <select class="form-control mdb-select" name="position">
        <option selected disabled>Select an option</option>
        @foreach ($allPositions as $pos)
            <option value="{{ $pos->IdPosition}}">{{ $pos->Name}}</option>
        @endforeach
    </select>
<br>

    <div class="form-group">
        <label> Enter description of you :  </label> <br>
       <textarea name="description"  ></textarea>
        <br>
    </div>



    {{csrf_field()}}

    <button type="submit" class="btn btn-primary">Submit Career  </button>



</form>



</html>
