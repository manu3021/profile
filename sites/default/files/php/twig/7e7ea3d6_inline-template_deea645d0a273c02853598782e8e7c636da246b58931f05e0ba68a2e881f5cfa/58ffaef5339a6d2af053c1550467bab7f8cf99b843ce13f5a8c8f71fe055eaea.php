<?php

/* {# inline_template_start #}<div class="main-slider-content-wrapper">
<div class="main-slider-text-wrapper">
<div class="main-slider-title">{{title}}</div>
<div class="main-slider-body">{{body}}</div>
</div>
<div class="main-slider-image">{{ field_main_slider_image}}</div>
</div> */
class __TwigTemplate_9d32e92829d70a02fd01cb509063485344f718feeb10de8ca4e351ef54674b7e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 1
        echo "<div class=\"main-slider-content-wrapper\">
<div class=\"main-slider-text-wrapper\">
<div class=\"main-slider-title\">";
        // line 3
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
        echo "</div>
<div class=\"main-slider-body\">";
        // line 4
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["body"]) ? $context["body"] : null), "html", null, true));
        echo "</div>
</div>
<div class=\"main-slider-image\">";
        // line 6
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["field_main_slider_image"]) ? $context["field_main_slider_image"] : null), "html", null, true));
        echo "</div>
</div>";
    }

    public function getTemplateName()
    {
        return "{# inline_template_start #}<div class=\"main-slider-content-wrapper\">
<div class=\"main-slider-text-wrapper\">
<div class=\"main-slider-title\">{{title}}</div>
<div class=\"main-slider-body\">{{body}}</div>
</div>
<div class=\"main-slider-image\">{{ field_main_slider_image}}</div>
</div>";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 6,  57 => 4,  53 => 3,  49 => 1,);
    }
}
/* {# inline_template_start #}<div class="main-slider-content-wrapper">*/
/* <div class="main-slider-text-wrapper">*/
/* <div class="main-slider-title">{{title}}</div>*/
/* <div class="main-slider-body">{{body}}</div>*/
/* </div>*/
/* <div class="main-slider-image">{{ field_main_slider_image}}</div>*/
/* </div>*/
