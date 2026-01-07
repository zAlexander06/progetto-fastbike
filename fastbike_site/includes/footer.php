<footer id="footer">
    <div class="contentFooter">
        <div class="informazioniAzienda">
            <div class="parteInterna-info">
                <div class="only-logo-footer">
                    <div id="logo-footer"></div>
                </div>
                <div class="informazioni-footer">
                    <div class="parte-testo-info">
                        <p><?php echo $testo['footer-desc-azienda']; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <hr class="separatore-footer">

        <div class="altreInformazioni">
            <div class="infoDentro-footer">
                <div class="social-email">
                    <div class="parte-social">
                        <h4><?php echo $testo['footer-seguici']; ?></h4>
                        <div class="link_social">
                            <!-- qua si usa javascript per mandare la richiesta di link alle seguenti pagine -->
                            <div id="social-facebook"></div>
                            <div id="social-instagram"></div>
                            <div id="social-twitter"></div>
                        </div>
                    </div>
                    <div class="contatto-email">
                        <h4><?php echo $testo['footer-iscriviti']; ?></h4>
                        <form action="noIndex/login.php?lang=<?php echo $lang; ?>&page=registration" method="post" id="footer-form-email">
                            <input type="email" name="email-cliente" id="nuova-email-cliente" placeholder="e-mail">
                            <input type="submit" id="btn-iscrizione-footer" value="" disabled>
                        </form>
                    </div>
                </div>

                <hr>

                <div class="informazioniSecondari">
                    <div class="sezione-contatti">
                        <h4><?php echo $testo['footer-contatti']; ?></h4>
                        <div class="diverseSezioni">
                            <div class="contattoContainer">
                                <a href="mailto:info@fastbike.it" class="sede-link">
                                    <p><span id="email-sede-img"></span>info@fastbike.it</p>
                                </a>

                                <a href="tel:+39 392 123 6425" class="sede-link">
                                    <p><span id="tel-sede-img"></span>+39 392 123 6425</p>
                                </a>

                                <a href="https://maps.app.goo.gl/kgFto7cDKsipnm1E6" class="sede-link">
                                    <p><span id="map-sede-img"></span>Piazza Acquaverde, 16 R/A, 16126 Genova GE</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="copyrightPagina">
                    <div class="terminiCondizioni">
                        <a href="" style="margin: 0px;"><?php echo $testo['footer-term-cond']; ?></a>
                    </div>
                    <span><?php echo $testo['footer-copyright']; ?></span>
                </div>
            </div>
        </div>
    </div>
</footer>