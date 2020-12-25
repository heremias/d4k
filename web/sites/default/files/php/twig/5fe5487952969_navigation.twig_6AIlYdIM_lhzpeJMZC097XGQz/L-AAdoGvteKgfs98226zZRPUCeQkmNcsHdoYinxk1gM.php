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

/* @boom/section/navigation.twig */
class __TwigTemplate_ca88c12e2ecef56c82dc44de09626ade812d6e55009d5c511c5268b53455f2a4 extends \Twig\Template
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
        $this->loadTemplate("@boom/section/navigation.twig", "@boom/section/navigation.twig", 1, "968024067")->display(twig_array_merge($context, ["container" => "fixed", "color" => "light", "utility_classes" => [0 => "bg-light"]]));
    }

    public function getTemplateName()
    {
        return "@boom/section/navigation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/section/navigation.twig", "/var/www/html/web/themes/custom/boom/src/components/section/navigation.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("embed" => 1);
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


/* @boom/section/navigation.twig */
class __TwigTemplate_ca88c12e2ecef56c82dc44de09626ade812d6e55009d5c511c5268b53455f2a4___968024067 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'branding' => [$this, 'block_branding'],
            'left' => [$this, 'block_left'],
            'right' => [$this, 'block_right'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        return "@bootstrap_storybook/navbar/navbar.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("@bootstrap_storybook/navbar/navbar.twig", "@boom/section/navigation.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 7
    public function block_branding($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_branding", [], "any", false, false, true, 8)) {
            // line 9
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_branding", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 11
        echo "  ";
    }

    // line 13
    public function block_left($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_left", [], "any", false, false, true, 14)) {
            // line 15
            echo "      <div class=\"mr-auto\">
        ";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_left", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 19
        echo "  ";
    }

    // line 21
    public function block_right($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 22
        echo "    ";
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_right", [], "any", false, false, true, 22)) {
            // line 23
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "navbar_right", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
            echo "
    ";
        }
        // line 25
        echo "  ";
    }

    public function getTemplateName()
    {
        return "@boom/section/navigation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  176 => 25,  170 => 23,  167 => 22,  163 => 21,  159 => 19,  153 => 16,  150 => 15,  147 => 14,  143 => 13,  139 => 11,  133 => 9,  130 => 8,  126 => 7,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "@boom/section/navigation.twig", "/var/www/html/web/themes/custom/boom/src/components/section/navigation.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 8);
        static $filters = array("escape" => 9);
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
