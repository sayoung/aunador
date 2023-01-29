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

/* themes/au/templates/extra/header.html.twig */
class __TwigTemplate_056d2148ebdc1df4323a95b7a16145620bf1e7f2811db6b60a608ae1894a6549 extends \Twig\Template
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
        echo "<header id=\"mob-header\" class=\"d-md-none\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"top-area\">
                    <div class=\"icon-bar\">
                        <ul>
                            <li>
                                <div class=\"search-wrapper\">
                                    <div class=\"input-holder\">
                                        <input type=\"text\" class=\"search-input\" placeholder=\"Type to search\" />
                                        <button class=\"search-icon\" onclick=\"searchToggle(this, event);\"><span></span></button>
                                    </div>
                                    <span class=\"close\" onclick=\"searchToggle(this, event);\"></span>
                                </div>
                            </li>
                            <li><a href=\"#\"><i class=\"fas fa-user\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-shopping-cart\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-envelope\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-globe\"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"mob-box\">
            <div class=\"row align-items-center\">
                <div class=\"col-sm-4 col-6\">
                    <div class=\"mobile-logo\">
                        <div class=\"logo-bar\">
                            <a href=\"#\"><img src=\"/themes/au/assets/images/logo.png\" alt=\"logo\"></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-8 col-6\">
                    ";
        // line 36
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "menu_mb", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
        echo "
                </div>
            </div>

        </div>
    </div>
</header>
<header id=\"header\" class=\"d-none d-md-block\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"top-area\">
                    <div class=\"icon-bar\">
                        <ul>
                            <li>
                                ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 51), 51, $this->source), "html", null, true);
        echo " 
                            </li>
                            
                            ";
        // line 54
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "panier", [], "any", false, false, true, 54), 54, $this->source), "html", null, true);
        echo "
                            ";
        // line 55
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "menu_user", [], "any", false, false, true, 55), 55, $this->source), "html", null, true);
        echo "
                            <li><a href=\"";
        // line 56
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "/form/contact\"><i class=\"fas fa-envelope\"></i></a></li>
                            <li>";
        // line 57
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "langue", [], "any", false, false, true, 57), 57, $this->source), "html", null, true);
        echo "</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row align-items-center\">
            <div class=\"col-md-4\">
                <div class=\"logo-area\">
                    <a href=\"";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>"));
        echo "\"><img src=\"/themes/au/assets/images/logo.png\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_slogan"] ?? null), 66, $this->source), "html", null, true);
        echo "\"></a>
                </div>
            </div>
            <div class=\"col-md-8\">
                <img src=\"/themes/au/assets/images/img12.png\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-12\">
              <div class=\"bottom-area\">
                            <!--Nav-->
    <div class=\"nav-outer clearfix\">
        <!--Mobile Navigation Toggler-->
        <div class=\"mobile-nav-toggler\"><span class=\"icon flaticon-menu-1\"></span></div>

        <!-- Main Menu -->
        <nav class=\"main-menu navbar-expand-md navbar-light\">
            <div class=\"collapse navbar-collapse show clearfix\" id=\"navbarSupportedContent\">
        ";
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "menu", [], "any", false, false, true, 84), 84, $this->source), "html", null, true);
        echo "
    </div>
</nav>
</div>  </div>
       
    </div>
</div>
</div>
    </div>
</header>";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/extra/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 84,  124 => 66,  112 => 57,  108 => 56,  104 => 55,  100 => 54,  94 => 51,  76 => 36,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<header id=\"mob-header\" class=\"d-md-none\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"top-area\">
                    <div class=\"icon-bar\">
                        <ul>
                            <li>
                                <div class=\"search-wrapper\">
                                    <div class=\"input-holder\">
                                        <input type=\"text\" class=\"search-input\" placeholder=\"Type to search\" />
                                        <button class=\"search-icon\" onclick=\"searchToggle(this, event);\"><span></span></button>
                                    </div>
                                    <span class=\"close\" onclick=\"searchToggle(this, event);\"></span>
                                </div>
                            </li>
                            <li><a href=\"#\"><i class=\"fas fa-user\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-shopping-cart\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-envelope\"></i></a></li>
                            <li><a href=\"#\"><i class=\"fas fa-globe\"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"mob-box\">
            <div class=\"row align-items-center\">
                <div class=\"col-sm-4 col-6\">
                    <div class=\"mobile-logo\">
                        <div class=\"logo-bar\">
                            <a href=\"#\"><img src=\"/themes/au/assets/images/logo.png\" alt=\"logo\"></a>
                        </div>
                    </div>
                </div>
                <div class=\"col-sm-8 col-6\">
                    {{ page.menu_mb }}
                </div>
            </div>

        </div>
    </div>
</header>
<header id=\"header\" class=\"d-none d-md-block\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"top-area\">
                    <div class=\"icon-bar\">
                        <ul>
                            <li>
                                {{ page.search }} 
                            </li>
                            
                            {{ page.panier }}
                            {{ page.menu_user }}
                            <li><a href=\"{{ url('<front>') }}/form/contact\"><i class=\"fas fa-envelope\"></i></a></li>
                            <li>{{ page.langue }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"row align-items-center\">
            <div class=\"col-md-4\">
                <div class=\"logo-area\">
                    <a href=\"{{ url('<front>') }}\"><img src=\"/themes/au/assets/images/logo.png\" alt=\"{{ site_slogan }}\"></a>
                </div>
            </div>
            <div class=\"col-md-8\">
                <img src=\"/themes/au/assets/images/img12.png\" alt=\"\">
            </div>
        </div>
        <div class=\"row\">
            <div class=\"col-12\">
              <div class=\"bottom-area\">
                            <!--Nav-->
    <div class=\"nav-outer clearfix\">
        <!--Mobile Navigation Toggler-->
        <div class=\"mobile-nav-toggler\"><span class=\"icon flaticon-menu-1\"></span></div>

        <!-- Main Menu -->
        <nav class=\"main-menu navbar-expand-md navbar-light\">
            <div class=\"collapse navbar-collapse show clearfix\" id=\"navbarSupportedContent\">
        {{ page.menu }}
    </div>
</nav>
</div>  </div>
       
    </div>
</div>
</div>
    </div>
</header>", "themes/au/templates/extra/header.html.twig", "/opt/drupal/web/themes/au/templates/extra/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 36);
        static $functions = array("url" => 56);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape'],
                ['url']
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
