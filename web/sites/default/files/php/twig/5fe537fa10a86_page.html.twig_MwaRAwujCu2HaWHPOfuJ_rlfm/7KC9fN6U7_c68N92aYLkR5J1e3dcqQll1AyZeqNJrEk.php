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

/* themes/custom/boom/templates/page/page.html.twig */
class __TwigTemplate_732d0d5282415b8d825c5dfba8734bad09c056a45c8a2a4b67209ad4eac99b88 extends \Twig\Template
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
        // line 7
        echo "<div class=\"page\">
  ";
        // line 8
        $this->loadTemplate("@boom/section/navigation.twig", "themes/custom/boom/templates/page/page.html.twig", 8)->display($context);
        // line 9
        echo "
  <main class=\"pt-5 pb-5\">
    ";
        // line 11
        $this->loadTemplate("@boom/section/header.twig", "themes/custom/boom/templates/page/page.html.twig", 11)->display($context);
        // line 12
        echo "
    ";
        // line 13
        $this->loadTemplate("@boom/section/content.twig", "themes/custom/boom/templates/page/page.html.twig", 13)->display($context);
        // line 14
        echo "  </main>

    ";
        // line 16
        $this->loadTemplate("@boom/section/footer.twig", "themes/custom/boom/templates/page/page.html.twig", 16)->display($context);
        // line 17
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/boom/templates/page/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 17,  59 => 16,  55 => 14,  53 => 13,  50 => 12,  48 => 11,  44 => 9,  42 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/boom/templates/page/page.html.twig", "/var/www/html/web/themes/custom/boom/templates/page/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 8);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
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
