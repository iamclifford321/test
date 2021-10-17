<?php

    class SweetAlert{

        public function displaySweetAlert($icon='success', $title='Success', $text='Created!', $footer=''){

            echo '<script>
                    Swal.fire({
                        icon: "'.$icon.'",
                        title: "' .$title. '",
                        text: "' .$text. '",
                        footer: "' .$footer. '"
                    })
                </script>';
        }

    }
?>