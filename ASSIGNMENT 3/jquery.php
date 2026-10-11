<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>jQuery Form Validation Example</title>

```
<script src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.22.1/jquery.validate.min.js"
    integrity="sha512-qu7dMuIm2f0KcKZ3BOoP4c+Hn+r4E8PbD2Ro4rmKsOyheCxcwhzQpf6SojA76dn+owqfANzfTFUTkGA+HpHjOA=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

<style>
    #name-error,
    #email-error,
    #password-error {
        color: red;
        font-size: 12px;
        font-style: italic;
    }
</style>
```

</head>

<body>

```
<form id="myForm">

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
    </div>

    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password">
    </div>

    <div>
        <button type="submit">Submit</button>
    </div>

</form>

<script>
    $(document).ready(function() {

        $("#myForm").validate({

            rules: {

                name: {
                    required: true,
                    minlength: 7,
                    maxlength: 10
                },

                email: {
                    required: true,
                    email: true
                },

                password: {
                    required: true,
                    minlength: 7,
                    maxlength: 10
                }

            },

            messages: {

                name: {
                    required: "Please enter your name",
                    minlength: "Name must be at least 7 characters long",
                    maxlength: "Name must not exceed 10 characters"
                },

                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },

                password: {
                    required: "Please enter a password",
                    minlength: "Password must be at least 7 characters long",
                    maxlength: "Password must not exceed 10 characters"
                }

            },

            errorElement: "span",
            errorClass: "error",

            submitHandler: function(form) {
                form.submit();
            }

        });

    });
</script>


</body>
</html>
