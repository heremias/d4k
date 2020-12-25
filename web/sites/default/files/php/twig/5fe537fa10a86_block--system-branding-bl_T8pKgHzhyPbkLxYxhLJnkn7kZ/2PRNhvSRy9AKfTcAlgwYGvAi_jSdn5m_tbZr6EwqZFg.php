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

/* themes/custom/boom/templates/block/block--system-branding-block.html.twig */
class __TwigTemplate_4dbba686bf99d47ab58b7e13beeab7bf3cb8394fa51e4db5ba2c63ff12b523d5 extends \Twig\Template
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
        $this->loadTemplate("themes/custom/boom/templates/block/block--system-branding-block.html.twig", "themes/custom/boom/templates/block/block--system-branding-block.html.twig", 7, "1222474266")->display($context);
    }

    public function getTemplateName()
    {
        return "themes/custom/boom/templates/block/block--system-branding-block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/boom/templates/block/block--system-branding-block.html.twig", "/var/www/html/web/themes/custom/boom/templates/block/block--system-branding-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("embed" => 7);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['embed'],
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


/* themes/custom/boom/templates/block/block--system-branding-block.html.twig */
class __TwigTemplate_4dbba686bf99d47ab58b7e13beeab7bf3cb8394fa51e4db5ba2c63ff12b523d5___1222474266 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        return "@boom/block/block.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@boom/block/block.twig", "themes/custom/boom/templates/block/block--system-branding-block.html.twig", 7);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 9
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 10
        echo "  ";
        $this->loadTemplate("@boom/navbar/navbar-brand.twig", "themes/custom/boom/templates/block/block--system-branding-block.html.twig", 10)->display(twig_array_merge($context, ["text" =>         // line 11
($context["site_name"] ?? null), "slogan" =>         // line 12
($context["site_slogan"] ?? null), "image" =>         // line 13
($context["site_logo"] ?? null), "width" => 30, "height" => "auto", "path" => $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("<front>"), "alt" => ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source,         // line 17
($context["elements"] ?? null), "content", [], "any", false, false, true, 17), "site_name", [], "any", false, false, true, 17)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#markup"] ?? null) : null) . " logo")]));
    }

    public function getTemplateName()
    {
        return "themes/custom/boom/templates/block/block--system-branding-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 17,  127 => 13,  126 => 12,  125 => 11,  123 => 10,  119 => 9,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/boom/templates/block/block--system-branding-block.html.twig", "/var/www/html/web/themes/custom/boom/templates/block/block--system-branding-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 10);
        static $filters = array();
        static $functions = array("path" => 16);

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                [],
                ['path']
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
