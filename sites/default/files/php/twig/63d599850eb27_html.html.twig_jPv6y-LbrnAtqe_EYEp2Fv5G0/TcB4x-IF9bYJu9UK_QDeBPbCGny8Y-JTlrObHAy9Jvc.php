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

/* themes/au/templates/html.html.twig */
class __TwigTemplate_f09df558e1b838cbedfd251cd16323d21c5926737e6f708c09baf16ae48f6297 extends \Twig\Template
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
        // line 27
        $context["body_classes"] = [0 => ((        // line 28
($context["logged_in"] ?? null)) ? ("user-logged-in") : ("")), 1 => (( !        // line 29
($context["root_path"] ?? null)) ? ("path-frontpage") : (("path-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["root_path"] ?? null), 29, $this->source))))), 2 => ((        // line 30
($context["node_type"] ?? null)) ? (("page-node-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["node_type"] ?? null), 30, $this->source)))) : ("")), 3 => ((        // line 31
($context["db_offline"] ?? null)) ? ("db-offline") : (""))];
        // line 34
        echo "<!DOCTYPE html>
<html";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["html_attributes"] ?? null), 35, $this->source), "html", null, true);
        echo ">
  <head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
  
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <head-placeholder token=\"";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 40, $this->source), "html", null, true);
        echo "\">
    <title>";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->safeJoin($this->env, $this->sandbox->ensureToStringAllowed(($context["head_title"] ?? null), 41, $this->source), " | "));
        echo "</title>
    <css-placeholder token=\"";
        // line 42
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 42, $this->source), "html", null, true);
        echo "\">
    <js-placeholder token=\"";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 43, $this->source), "html", null, true);
        echo "\">
\t            <link href=\"https://fonts.googleapis.com/css?family=Cairo&display=swap\" rel=\"stylesheet\"> 
            <link rel=\"stylesheet\" href=\"https://unpkg.com/fullpage.js/dist/fullpage.min.css\">
    \t<script type=\"text/javascript\" src=\"";
        // line 46
        $context["base_url"] = twig_join_filter(twig_split_filter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>")), "/",  -1), "/");
        echo "/themes/au/assets/js/tarteaucitron/tarteaucitron.js\"></script> 
\t<script type=\"text/javascript\">
        tarteaucitron.init({
    \t  \"privacyUrl\": \"\", /* Privacy policy url */

    \t  \"hashtag\": \"#tarteaucitron\", /* Open the panel with this hashtag */
    \t  \"cookieName\": \"tarteaucitron\", /* Cookie name */
    
    \t  \"orientation\": \"bottom\", /* Banner position (top - bottom) */
    \t  \"showAlertSmall\": false, /* Show the small banner on bottom right */
    \t  \"cookieslist\": true, /* Show the cookie list */

    \t  \"adblocker\": false, /* Show a Warning if an adblocker is detected */
    \t  \"AcceptAllCta\" : true, /* Show the accept all button when highPrivacy on */
    \t  \"highPrivacy\": false, /* Disable auto consent */
    \t  \"handleBrowserDNTRequest\": false, /* If Do Not Track == 1, disallow all */

    \t  \"removeCredit\": false, /* Remove credit link */
    \t  \"moreInfoLink\": true, /* Show more info link */
    \t  \"useExternalCss\": false, /* If false, the tarteaucitron.css file will be loaded */

    \t  //\"cookieDomain\": \".my-multisite-domaine.fr\", /* Shared cookie for multisite */
                          
    \t  \"readmoreLink\": \"/cookiespolicy\" /* Change the default readmore link */
        });
        </script>
  </head>
  <body";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["body_classes"] ?? null)], "method", false, false, true, 73), 73, $this->source), "html", null, true);
        echo ">
    ";
        // line 78
        echo "   <!-- <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      ";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Skip to main content"));
        echo "
    </a> -->
    ";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_top"] ?? null), 81, $this->source), "html", null, true);
        echo "
    ";
        // line 82
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page"] ?? null), 82, $this->source), "html", null, true);
        echo "
    ";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["page_bottom"] ?? null), 83, $this->source), "html", null, true);
        echo "
    <js-bottom-placeholder token=\"";
        // line 84
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["placeholder_token"] ?? null), 84, $this->source), "html", null, true);
        echo "\">
               <!-- YouTube Modal Window -->
               
         <!-- YouTube Modal Window -->
        
          ";
        // line 89
        if (($context["is_front"] ?? null)) {
            // line 90
            echo "
\t\t
";
        }
        // line 93
        echo "
  <script type=\"text/javascript\">
        (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
\t\t(tarteaucitron.job = tarteaucitron.job || []).push('youtube');
\t\t(tarteaucitron.job = tarteaucitron.job || []).push('twitter');
        </script>


</html>
";
    }

    public function getTemplateName()
    {
        return "themes/au/templates/html.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  143 => 93,  138 => 90,  136 => 89,  128 => 84,  124 => 83,  120 => 82,  116 => 81,  111 => 79,  108 => 78,  104 => 73,  74 => 46,  68 => 43,  64 => 42,  60 => 41,  56 => 40,  48 => 35,  45 => 34,  43 => 31,  42 => 30,  41 => 29,  40 => 28,  39 => 27,);
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override for the basic structure of a single Drupal page.
 *
 * Variables:
 * - logged_in: A flag indicating if user is logged in.
 * - root_path: The root path of the current page (e.g., node, admin, user).
 * - node_type: The content type for the current node, if the page is a node.
 * - head_title: List of text elements that make up the head_title variable.
 *   May contain one or more of the following:
 *   - title: The title of the page.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site.
 * - page_top: Initial rendered markup. This should be printed before 'page'.
 * - page: The rendered page markup.
 * - page_bottom: Closing rendered markup. This variable should be printed after
 *   'page'.
 * - db_offline: A flag indicating if the database is offline.
 * - placeholder_token: The token for generating head, css, js and js-bottom
 *   placeholders.
 *
 * @see template_preprocess_html()
 */
#}
{%
  set body_classes = [
    logged_in ? 'user-logged-in',
    not root_path ? 'path-frontpage' : 'path-' ~ root_path|clean_class,
    node_type ? 'page-node-type-' ~ node_type|clean_class,
    db_offline ? 'db-offline',
  ]
%}
<!DOCTYPE html>
<html{{ html_attributes }}>
  <head><meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
  
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

    <head-placeholder token=\"{{ placeholder_token }}\">
    <title>{{ head_title|safe_join(' | ') }}</title>
    <css-placeholder token=\"{{ placeholder_token }}\">
    <js-placeholder token=\"{{ placeholder_token }}\">
\t            <link href=\"https://fonts.googleapis.com/css?family=Cairo&display=swap\" rel=\"stylesheet\"> 
            <link rel=\"stylesheet\" href=\"https://unpkg.com/fullpage.js/dist/fullpage.min.css\">
    \t<script type=\"text/javascript\" src=\"{% set base_url = url('<front>')|render|split('/', -1)|join('/') %}/themes/au/assets/js/tarteaucitron/tarteaucitron.js\"></script> 
\t<script type=\"text/javascript\">
        tarteaucitron.init({
    \t  \"privacyUrl\": \"\", /* Privacy policy url */

    \t  \"hashtag\": \"#tarteaucitron\", /* Open the panel with this hashtag */
    \t  \"cookieName\": \"tarteaucitron\", /* Cookie name */
    
    \t  \"orientation\": \"bottom\", /* Banner position (top - bottom) */
    \t  \"showAlertSmall\": false, /* Show the small banner on bottom right */
    \t  \"cookieslist\": true, /* Show the cookie list */

    \t  \"adblocker\": false, /* Show a Warning if an adblocker is detected */
    \t  \"AcceptAllCta\" : true, /* Show the accept all button when highPrivacy on */
    \t  \"highPrivacy\": false, /* Disable auto consent */
    \t  \"handleBrowserDNTRequest\": false, /* If Do Not Track == 1, disallow all */

    \t  \"removeCredit\": false, /* Remove credit link */
    \t  \"moreInfoLink\": true, /* Show more info link */
    \t  \"useExternalCss\": false, /* If false, the tarteaucitron.css file will be loaded */

    \t  //\"cookieDomain\": \".my-multisite-domaine.fr\", /* Shared cookie for multisite */
                          
    \t  \"readmoreLink\": \"/cookiespolicy\" /* Change the default readmore link */
        });
        </script>
  </head>
  <body{{ attributes.addClass(body_classes) }}>
    {#
      Keyboard navigation/accessibility link to main content section in
      page.html.twig.
    #}
   <!-- <a href=\"#main-content\" class=\"visually-hidden focusable skip-link\">
      {{ 'Skip to main content'|t }}
    </a> -->
    {{ page_top }}
    {{ page }}
    {{ page_bottom }}
    <js-bottom-placeholder token=\"{{ placeholder_token }}\">
               <!-- YouTube Modal Window -->
               
         <!-- YouTube Modal Window -->
        
          {% if is_front %}

\t\t
{% endif %}

  <script type=\"text/javascript\">
        (tarteaucitron.job = tarteaucitron.job || []).push('facebook');
\t\t(tarteaucitron.job = tarteaucitron.job || []).push('youtube');
\t\t(tarteaucitron.job = tarteaucitron.job || []).push('twitter');
        </script>


</html>
", "themes/au/templates/html.html.twig", "/opt/drupal/web/themes/au/templates/html.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 27, "if" => 89);
        static $filters = array("clean_class" => 29, "escape" => 35, "safe_join" => 41, "join" => 46, "split" => 46, "render" => 46, "t" => 79);
        static $functions = array("url" => 46);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'safe_join', 'join', 'split', 'render', 't'],
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
