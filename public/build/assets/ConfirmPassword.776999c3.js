import{y as d,o as l,p as m,w as r,a as o,u as a,H as c,b as e,n as p,g as u,q as f}from"./app.847e1edc.js";import{_,a as w}from"./Guest.5327b9aa.js";import{_ as b,a as h,b as x}from"./ValidationErrors.50828193.js";import"./ApplicationLogo.8c414e09.js";import"./plugin-vue_export-helper.21dcd24c.js";const y=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),V=["onSubmit"],g={class:"flex justify-end mt-4"},v=f(" Confirm "),F={__name:"ConfirmPassword",setup(C){const s=d({password:""}),i=()=>{s.post(route("password.confirm"),{onFinish:()=>s.reset()})};return($,t)=>(l(),m(_,null,{default:r(()=>[o(a(c),{title:"Confirm Password"}),y,o(b,{class:"mb-4"}),e("form",{onSubmit:u(i,["prevent"])},[e("div",null,[o(h,{for:"password",value:"Password"}),o(x,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:a(s).password,"onUpdate:modelValue":t[0]||(t[0]=n=>a(s).password=n),required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"])]),e("div",g,[o(w,{class:p(["ml-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:r(()=>[v]),_:1},8,["class","disabled"])])],40,V)]),_:1}))}};export{F as default};
