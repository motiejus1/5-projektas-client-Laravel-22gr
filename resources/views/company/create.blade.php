<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Company</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h1>Create Company</h1>

        <form method='POST' action='{{route('company.store')}}' >

            {{-- 
             // ID
            // name(string)
            // type(string)
            // description(string) --}}


            <input class="form-control" type='text' name="company_name" value="Test" placeholder="Company Name"/>
            {{-- <input  class="form-control" type='text' name="company_type" value="Test" placeholder="Company Type"/> --}}
            <select class='form-select ' name='company_type'>
                {{-- Visa tipu sarasa --}}
                @foreach ($types as $type)
                    <option value='{{$type->id}}'>{{$type->short_name}},{{$type->name}}</option>
                @endforeach
            </select>    
            <input  class="form-control" type='text' name="company_description" value="Test"  placeholder="Company Description"/>
            @csrf

            <button class="btn btn-primary" type='submit'>Add</button>
            <a class="btn btn-secondary" href="{{route('company.index')}}">Back</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
           
</body>
</html>
