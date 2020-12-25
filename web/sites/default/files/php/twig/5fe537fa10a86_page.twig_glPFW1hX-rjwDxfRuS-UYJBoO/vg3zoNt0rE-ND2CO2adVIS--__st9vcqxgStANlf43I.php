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

/* @boom/page/page.twig */
class __TwigTemplate_03a2a80662f270de7ee78c8f970e7252ac164ad1cd78b2c0d50bde4ae3fefa20 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'pageNavigation' => [$this, 'block_pageNavigation'],
            'pageMain' => [$this, 'block_pageMain'],
            'pageFooter' => [$this, 'block_pageFooter'],
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
        $this->displayBlock('pageNavigation', $context, $blocks);
        // line 11
        echo "
  <main class=\"pt-5 pb-5\">
    ";
        // line 13
        $this->displayBlock('pageMain', $context, $blocks);
        // line 17
        echo "  </main>

  ";
        // line 19
        $this->displayBlock('pageFooter', $context, $blocks);
        // line 22
        echo "</div>
";
    }

    // line 8
    public function block_pageNavigation($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 9
        echo "    ";
        $this->loadTemplate("@boom/section/navigation.twig", "@boom/page/page.twig", 9)->display($context);
        // line 10
        echo "  ";
    }

    // line 13
    public function block_pageMain($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "      ";
        $this->loadTemplate("@boom/section/header.twig", "@boom/page/page.twig", 14)->display($context);
        // line 15
        echo "      ";
        $this->loadTemplate("@boom/section/content.twig", "@boom/page/page.twig", 15)->display($context);
        // line 16
        echo "    ";
    }

    // line 19
    public function block_pageFooter($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "    ";
        $this->loadTemplate("@boom/section/footer.twig", "@boom/page/page.twig", 20)->display($context);
        // line 21
        echo "  ";
    }

    public function getTemplateName()
    {
        return "@boom/page/page.twig";
    }

    public function getDebugInfo()
    {
        return array (  96 => 21,  93 => 20,  89 => 19,  85 => 16,  82 => 15,  79 => 14,  75 => 13,  71 => 10,  68 => 9,  64 => 8,  59 => 22,  57 => 19,  53 => 17,  51 => 13,  47 => 11,  45 => 8,  42 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/page/page.twig", "/var/www/html/web/themes/custom/boom/src/components/page/page.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 8, "include" => 9);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['block', 'include'],
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
