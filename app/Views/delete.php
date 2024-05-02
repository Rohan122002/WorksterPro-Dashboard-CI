<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-cancel{
            color: rgba(119, 140, 162, 1);
        }
        .swal2-html-container{
            display: flex;
        }
        div:where(.swal2-container).swal2-center>.swal2-popup {
    grid-column: 2;
    grid-row: 2;
    place-self: center center;
    width: 41rem;
}
        div:where(.swal2-container) h2:where(.swal2-title) {
            font-family: 'Rubik', sans-serif;
    position: relative;
    max-width: 100%;
    margin: 0;
    padding: 1.85rem 2.6rem 0rem 3.6rem;
    color: rgba(251, 77, 77, 1);
    font-size: 1.25rem;
    font-weight: 400;
    text-align: left;
    text-transform: none;
    word-wrap: break-word;
}
div:where(.swal2-container) .swal2-html-container {
    font-family: Rubik;
    
    justify-content: left;
    margin: 1em 1.6em 0.3em;
    padding: 0;
    overflow: auto;
    color: rgba(152, 169, 188, 1);
    font-size: 0.875rem;
    font-weight: normal;
    line-height: 1.31rem;
    text-align: center;
    word-wrap: break-word;
    word-break: break-word;
}
div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm {
    font-family: 'Rubik', sans-serif;
    border: 0;
    border-radius: 0.25em;
    background: initial;
    background-color: #7066e0;
    color: #fff;
    font-size: 0.875rem;
    padding-top: 0.7125rem;
    padding-bottom: 0.7125rem;
    padding-left: 3.5rem;
    padding-right: 4rem;
}
div:where(.swal2-container) button:where(.swal2-styled).swal2-cancel {
    font-family: 'Rubik', sans-serif;
    border: 0;
    border-radius: 0.25em;
    background: initial;
    background-color:rgba(255, 255, 255, 1);
    color: rgba(119, 140, 162, 1);
    font-size: 0.875rem;
    padding-top: 0.7125rem;
    padding-bottom: 0.7125rem;
    padding-left: 3.5rem;
    padding-right: 2.25rem;
    margin-left: 2.25rem;
   
}
div:where(.swal2-container) div:where(.swal2-actions) {
    display: flex;
    z-index: 1;
    box-sizing: border-box;
    flex-wrap: wrap;
    align-items: center;
    justify-content: right;
    width: 100%;
    margin: auto;
    padding: 2.7rem 3.7rem 2.12rem 0rem;
    float: right;
}
    </style>
</head>
<body>
    <script>
         Swal.fire({
                title: "Delete ",
                text: "Are you sure you want to delete the user “Name” ?",
                // icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#4D7CFE",
                cancelButtonColor: "#F2F4F6",
                confirmButtonText: "Yes"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                }
            });
    </script>
</body>
</html>