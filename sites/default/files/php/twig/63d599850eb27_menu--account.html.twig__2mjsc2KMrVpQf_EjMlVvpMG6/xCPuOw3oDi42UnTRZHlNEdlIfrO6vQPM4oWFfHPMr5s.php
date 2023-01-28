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

/* themes/au/templates/navigation/menu--account.html.twig */
class __TwigTemplate_29aa27635fa113ed1ae9bcba5833e18a2b43a33406a72e1a7a76fa7ffaf553b9 extends \Twig\Template
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
        // line 21
        if (($context["logged_in"] ?? null)) {
            echo " 

        
            <li class=\"menu-item usr-log-edit \" >
        <a href=\"";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front"] ?? null), 25, $this->source), "html", null, true);
            echo "/user/";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "id", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "/edit\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user-edit\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>
    
            <li class=\"menu-item usr-log-out ";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front"] ?? null), 35, $this->source), "html", null, true);
            echo "\" >
        <a href=\"";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front"] ?? null), 36, $this->source), "html", null, true);
            echo "/user/logout\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user-lock\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>

\t\t
           ";
        } else {
            // line 48
            echo "
        
            <li class=\"menu-item usr-log-in\">
        <a href=\"";
            // line 51
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front"] ?? null), 51, $this->source), "html", null, true);
            echo "/user/login\" tabindex=\"-1\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>

\t\t   
\t\t ";
        }
    }

    public function getTemplateName()
    {
        return "themes/au/templates/navigation/menu--account.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 51,  80 => 48,  65 => 36,  61 => 35,  46 => 25,  39 => 21,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a menu.
 *
 * Available variables:
 * - menu_name: The machine name of the menu.
 * - items: A nested list of menu items. Each menu item contains:
 *   - attributes: HTML attributes for the menu item.
 *   - below: The menu item child items.
 *   - title: The menu link title.
 *   - url: The menu link url, instance of \\Drupal\\Core\\Url
 *   - localized_options: Menu link localized options.
 *   - is_expanded: TRUE if the link has visible children within the current
 *     menu tree.
 *   - is_collapsed: TRUE if the link has children within the current menu tree
 *     that are not currently visible.
 *   - in_active_trail: TRUE if the link is in the active trail.
 */
#}
{% if logged_in %} 

        
            <li class=\"menu-item usr-log-edit \" >
        <a href=\"{{ front }}/user/{{ user.id }}/edit\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user-edit\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>
    
            <li class=\"menu-item usr-log-out {{ front }}\" >
        <a href=\"{{ front }}/user/logout\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user-lock\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>

\t\t
           {% else %}

        
            <li class=\"menu-item usr-log-in\">
        <a href=\"{{ front }}/user/login\" tabindex=\"-1\">
\t\t<span class=\"icon\">
\t\t <i class=\"fas fa-user\" ></i>
\t\t  
\t\t</span>
\t\t</a>
\t\t
        
      </li>

\t\t   
\t\t {% endif %}
", "themes/au/templates/navigation/menu--account.html.twig", "/opt/drupal/web/themes/au/templates/navigation/menu--account.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 21);
        static $filters = array("escape" => 25);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
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
