import{r as _,u as h,o as v,a as u,c as d,b as c,t as i,d as l,e as L,F as f,f as w,p as y,g as b,h as x}from"./vue_core.js";(function(){const r=document.createElement("link").relList;if(r&&r.supports&&r.supports("modulepreload"))return;for(const e of document.querySelectorAll('link[rel="modulepreload"]'))n(e);new MutationObserver(e=>{for(const t of e)if(t.type==="childList")for(const a of t.addedNodes)a.tagName==="LINK"&&a.rel==="modulepreload"&&n(a)}).observe(document,{childList:!0,subtree:!0});function s(e){const t={};return e.integrity&&(t.integrity=e.integrity),e.referrerPolicy&&(t.referrerPolicy=e.referrerPolicy),e.crossOrigin==="use-credentials"?t.credentials="include":e.crossOrigin==="anonymous"?t.credentials="omit":t.credentials="same-origin",t}function n(e){if(e.ep)return;e.ep=!0;const t=s(e);fetch(e.href,t)}})();const S="/vite.svg",I="data:image/svg+xml,%3csvg%20xmlns='http://www.w3.org/2000/svg'%20xmlns:xlink='http://www.w3.org/1999/xlink'%20aria-hidden='true'%20role='img'%20class='iconify%20iconify--logos'%20width='37.07'%20height='36'%20preserveAspectRatio='xMidYMid%20meet'%20viewBox='0%200%20256%20198'%3e%3cpath%20fill='%2341B883'%20d='M204.8%200H256L128%20220.8L0%200h97.92L128%2051.2L157.44%200h47.36Z'%3e%3c/path%3e%3cpath%20fill='%2341B883'%20d='m0%200l128%20220.8L256%200h-51.2L128%20132.48L50.56%200H0Z'%3e%3c/path%3e%3cpath%20fill='%2335495E'%20d='M50.56%200L128%20133.12L204.8%200h-47.36L128%2051.2L97.92%200H50.56Z'%3e%3c/path%3e%3c/svg%3e",m=(o,r)=>{const s=o.__vccOpts||o;for(const[n,e]of r)s[n]=e;return s},O={key:0},V={class:"card"},A={__name:"HelloWorld",props:{msg:String},setup(o){_(0);const r=_(!1),s=h("eastDoctorsList",{count:0,msg:"Hello"});return v(()=>{window.__eastDoctorsList=s,window.__eastDoctorsList&&(r.value=!0)}),(n,e)=>(u(),d(f,null,[c("h1",null,i(o.msg),1),r.value?(u(),d("div",O,i(l(s)),1)):L("",!0),c("div",V,[c("button",{type:"button",onClick:e[0]||(e[0]=t=>l(s).count++)},"Increment count in app1: "+i(l(s).count),1)])],64))}},B=m(A,[["__scopeId","data-v-5549df8b"]]),H=o=>(y("data-v-7d7eb1a8"),o=o(),b(),o),M=H(()=>c("div",null,[c("a",{href:"https://vitejs.dev",target:"_blank"},[c("img",{src:S,class:"logo",alt:"Vite logo"})]),c("a",{href:"https://vuejs.org/",target:"_blank"},[c("img",{src:I,class:"logo vue",alt:"Vue logo"})])],-1)),N={__name:"App",setup(o){return(r,s)=>(u(),d(f,null,[M,w(B,{msg:"Vite + Vue"})],64))}},k=m(N,[["__scopeId","data-v-7d7eb1a8"]]),D=x(k);let g="#east-doctors-list";const p=document.querySelector(g);p&&p.__vue_app__&&p.__vue_app__.unmount();D.mount(g);
