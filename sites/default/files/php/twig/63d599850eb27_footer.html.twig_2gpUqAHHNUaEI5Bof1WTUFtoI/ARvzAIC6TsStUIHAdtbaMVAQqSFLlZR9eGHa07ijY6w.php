<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/au/templates/extra/footer.html.twig */
class __TwigTemplate_d12ace9f343df676918e8adcabcb3485061174e5e4bc2f4caa403c5984e87af3 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<footer id=\"footer\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-12 col-lg-8\">
                <div class=\"row align-items-center\">
                    <div class=\"col-sm-4 col-12 center\">
                        <a href=\"#\"><img src=\"/themes/au/assets/images/footer-logo.png\" alt=\"\" class=\"wi\"></a>
                    </div>
                    <div class=\"col-sm-3 col-lg-2 text-center col-12 center\">
                        <img src=\"/themes/au/assets/images/icon08.png\" alt=\"\">
                    </div>
                    <div class=\"col-sm-5 center d-none d-sm-block\">
                        <p>© 2022 Agence Urbaine de Nador-Driouch-Guercif.</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-12 col-lg-4 mt-md-4 mt-sm-4 mt-lg-0\">
                <div class=\"row align-items-center\">
                    <div class=\"col-sm-4 col-12 col-md-4 center\">
                        <p>Mentions légales</p>
                    </div>
                    <div class=\"col-sm-3 col-12 col-md-2 text-md-end text-sm-center text-center\">
                        <img src=\"/themes/au/assets/images/bar01.png\" alt=\"\">
                    </div>
                    <div class=\"col-sm-5 col-md-6\">
                        <ul>
                            <li><a href=\"#\"><i class=\"fab fa-facebook-square\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fab fa-instagram\"></i></a></li>
                        </ul>
                    </div>
                    <div class=\"col-sm-5 center d-sm-none mb-0\">
                        <p>© 2022 Agence Urbaine de Nador-Driouch-Guercif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/extra/footer.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer id=\"footer\">
    <div class=\"container\">
        <div class=\"row align-items-center\">
            <div class=\"col-md-12 col-lg-8\">
                <div class=\"row align-items-center\">
                    <div class=\"col-sm-4 col-12 center\">
                        <a href=\"#\"><img src=\"/themes/au/assets/images/footer-logo.png\" alt=\"\" class=\"wi\"></a>
                    </div>
                    <div class=\"col-sm-3 col-lg-2 text-center col-12 center\">
                        <img src=\"/themes/au/assets/images/icon08.png\" alt=\"\">
                    </div>
                    <div class=\"col-sm-5 center d-none d-sm-block\">
                        <p>© 2022 Agence Urbaine de Nador-Driouch-Guercif.</p>
                    </div>
                </div>
            </div>
            <div class=\"col-md-12 col-lg-4 mt-md-4 mt-sm-4 mt-lg-0\">
                <div class=\"row align-items-center\">
                    <div class=\"col-sm-4 col-12 col-md-4 center\">
                        <p>Mentions légales</p>
                    </div>
                    <div class=\"col-sm-3 col-12 col-md-2 text-md-end text-sm-center text-center\">
                        <img src=\"/themes/au/assets/images/bar01.png\" alt=\"\">
                    </div>
                    <div class=\"col-sm-5 col-md-6\">
                        <ul>
                            <li><a href=\"#\"><i class=\"fab fa-facebook-square\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fab fa-twitter\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fab fa-instagram\"></i></a></li>
                        </ul>
                    </div>
                    <div class=\"col-sm-5 center d-sm-none mb-0\">
                        <p>© 2022 Agence Urbaine de Nador-Driouch-Guercif.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>", "themes/au/templates/extra/footer.html.twig", "/opt/drupal/web/themes/au/templates/extra/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
