        </div>
    </main>
    <footer class="container d-flex fixed-bottom">
        <?php echo "Copy right &copy" ." - ".date("y")?>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $( function() {
            $( "#dob" ).datepicker({
                changeMonth: true,
                changeYear: true,
                yearRange: "-100:+0",
                dateFormat: "yy-mm-dd"
            });
        });
  </script>
  <script>

        const activePage = window.location.pathname;
        const navLinks = document.querySelectorAll("ul li a").
        forEach(link =>{
            if(activePage === "/")
            {
                if(link.href.includes("/index.php")){
                    link.classList.add("active");
                }
            }
            else
            {
                if(link.href.includes(`${activePage}`)){
                    link.classList.add("active");
                }
            }
        });
    </script>
</body>
</html>